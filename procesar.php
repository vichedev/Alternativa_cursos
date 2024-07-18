<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de ajustar la ruta según la ubicación de tu autoload.php

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron fecha y curso_id
    if (!isset($_POST['fecha']) || !isset($_POST['curso_id'])) {
        die("Error: Fecha o ID del curso no seleccionados.");
    }
    
    // Incluir el archivo de conexión a la base de datos
    require_once('includes/db.php');
    
    // Obtener datos del formulario
    $fecha = $_POST['fecha'];
    $curso_id = $_POST['curso_id'];
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    
    // Procesar archivos adjuntos
    $directorio_destino = "uploads/";
    $archivo_cedula = $_FILES['archivo_cedula']['name'] ?? '';
    $archivo_placa = $_FILES['archivo_placa']['name'] ?? '';
    $archivo_pago = $_FILES['archivo_pago']['name'] ?? '';
    
    // Mover archivos adjuntos
    move_uploaded_file($_FILES['archivo_cedula']['tmp_name'], $directorio_destino . $archivo_cedula);
    move_uploaded_file($_FILES['archivo_placa']['tmp_name'], $directorio_destino . $archivo_placa);
    move_uploaded_file($_FILES['archivo_pago']['tmp_name'], $directorio_destino . $archivo_pago);
    
    // Verificar la fecha y actualizar los cupos disponibles
    if ($fecha == '2024-08-03') {
        $cupos_columna = 'cupos_3_agosto';
    } elseif ($fecha == '2024-08-10') {
        $cupos_columna = 'cupos_10_agosto';
    } else {
        die("Fecha no válida.");
    }
    
    // Verificar y actualizar los cupos disponibles
    $query_cupos = "SELECT $cupos_columna FROM cursos WHERE id = $curso_id FOR UPDATE";
    $result_cupos = mysqli_query($conexion, $query_cupos);

    if ($result_cupos && mysqli_num_rows($result_cupos) > 0) {
        $row = mysqli_fetch_assoc($result_cupos);
        $cupos_disponibles = $row[$cupos_columna];

        if ($cupos_disponibles > 0) {
            // Insertar datos en la base de datos incluyendo la fecha del curso
            $query = "INSERT INTO inscripciones (curso_id, fecha_inscripcion, nombres, apellidos, telefono, correo, cedula, archivo_cedula, archivo_placa, archivo_pago, fecha_curso) 
                      VALUES ('$curso_id', NOW(), '$nombres', '$apellidos', '$telefono', '$correo', '$cedula', '$archivo_cedula', '$archivo_placa', '$archivo_pago', '$fecha')";
            
            if (mysqli_query($conexion, $query)) {
                // Reducir el cupo disponible
                $query_update = "UPDATE cursos SET $cupos_columna = $cupos_columna - 1 WHERE id = $curso_id";
                mysqli_query($conexion, $query_update);

                // Obtener el cupo asignado
                $query_cupo_asignado = "SELECT COUNT(*) AS cupo_asignado FROM inscripciones WHERE curso_id = $curso_id AND fecha_curso = '$fecha'";
                $result_cupo_asignado = mysqli_query($conexion, $query_cupo_asignado);
                $row_cupo_asignado = mysqli_fetch_assoc($result_cupo_asignado);
                $cupo_asignado = $row_cupo_asignado['cupo_asignado'];

                // Obtener detalles del curso
                $query_curso = "SELECT nombre, descripcion, docente, ubicacion FROM cursos WHERE id = $curso_id";
                $result_curso = mysqli_query($conexion, $query_curso);
                $row_curso = mysqli_fetch_assoc($result_curso);
                $nombre_curso = $row_curso['nombre'];
                $descripcion_curso = $row_curso['descripcion'];
                $docente_curso = $row_curso['docente'];
                $ubicacion_curso = $row_curso['ubicacion'];

                // Configuración del servidor SMTP y envío de correos
                $mail = new PHPMailer(true);
                
                try {
                    // Configuración del servidor SMTP
                    $mail->isSMTP();
                    $mail->Host = 'mail.rednuevaconexion.net'; // Cambia al servidor SMTP que uses
                    $mail->SMTPAuth = true;
                    $mail->Username = 'registros@rednuevaconexion.net'; // Cambia al correo electrónico del remitente
                    $mail->Password = 'Soporte@2023'; // Cambia a la contraseña del correo electrónico
                    $mail->SMTPSecure = 'tls'; // Puede ser 'ssl' también
                    $mail->Port = 587; // Puerto SMTP
                    
                    // Correo al estudiante
                    $mail->setFrom('registros@rednuevaconexion.net', 'RED NUEVA CONEXIÓN'); // Cambia el remitente
                    $mail->addAddress($correo, $nombres); // Correo y nombre del estudiante
                    $mail->isHTML(true);
                    $mail->Subject = 'Confirmación de Inscripción';
                    $mail->Body    = "<p>¡Gracias por inscribirte a nuestro curso!</p>
                                      <p>Detalles de la inscripción:</p>
                                      <ul>
                                          <li><strong>Curso:</strong> $nombre_curso</li>
                                          <li><strong>Descripción:</strong> $descripcion_curso</li>
                                          <li><strong>Docente:</strong> $docente_curso</li>
                                          <li><strong>Ubicación:</strong> $ubicacion_curso</li>
                                          <li><strong>Fecha seleccionada:</strong> " . date('j F Y', strtotime($fecha)) . "</li>
                                      </ul>"; // Puedes personalizar el mensaje aquí
                    $mail->AltBody = "¡Gracias por inscribirte a nuestro curso!\n\nDetalles de la inscripción:\n\n" .
                                     "- Curso: $nombre_curso\n" .
                                     "- Descripción: $descripcion_curso\n" .
                                     "- Docente: $docente_curso\n" .
                                     "- Ubicación: $ubicacion_curso\n" .
                                     "- Fecha seleccionada: " . date('j F Y', strtotime($fecha));
                    
                    $mail->CharSet = 'UTF-8';
                   
                    // Envío de correo al estudiante
                    $mail->send();
                    
                    // Correo al administrador
                    $mail->clearAddresses();
                    $mail->addAddress('registros@rednuevaconexion.net', 'Administrador'); // Correo y nombre del administrador
                    $mail->Subject = 'Nueva Inscripción Registrada';
                    $mail->Body    = "<p>Se ha registrado una nueva inscripción:</p>
                                      <ul>
                                          <li><strong>Nombre:</strong> $nombres $apellidos</li>
                                          <li><strong>Correo:</strong> $correo</li>
                                          <li><strong>Teléfono:</strong> $telefono</li>
                                          <li><strong>Cédula:</strong> $cedula</li>
                                          <li><strong>Curso:</strong> $nombre_curso</li>
                                          <li><strong>Fecha seleccionada:</strong> " . date('j F Y', strtotime($fecha)) . "</li>
                                      </ul>"; // Puedes personalizar el mensaje aquí
                    $mail->AltBody = "Se ha registrado una nueva inscripción:\n\n" .
                                     "- Nombre: $nombres $apellidos\n" .
                                     "- Correo: $correo\n" .
                                     "- Teléfono: $telefono\n" .
                                     "- Cédula: $cedula\n" .
                                     "- Curso: $nombre_curso\n" .
                                     "- Fecha seleccionada: " . date('j F Y', strtotime($fecha));
                    
                    $mail->CharSet = 'UTF-8';
                    
                    // Adjuntar archivos (opcional)
                    $mail->addAttachment($directorio_destino . $archivo_cedula);
                    $mail->addAttachment($directorio_destino . $archivo_placa);
                    $mail->addAttachment($directorio_destino . $archivo_pago);
                    
                    // Envío de correo al administrador
                    $mail->send();
                    
                    // Mensaje de éxito y redireccionamiento
                    echo '<script>alert("¡Inscripción realizada con éxito!"); window.location.replace("index.php");</script>';
                } catch (Exception $e) {
                    echo "Error al enviar correo: {$mail->ErrorInfo}";
                }
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conexion);
            }
        } else {
            echo "Lo sentimos, ya no hay cupos disponibles para esta fecha.";
        }
    } else {
        die("Error al obtener los cupos disponibles para esta fecha.");
    }
    
    // Cerrar conexión
    mysqli_close($conexion);
} else {
    // Si no es una solicitud POST, redirigir o manejar según tu lógica de aplicación
    die("Acceso denegado.");
}
?>
