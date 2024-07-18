<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambiar si es necesario
$usuario = 'root'; // Cambiar si es necesario
$contrasena = ''; // Cambiar si es necesario
$base_datos = 'cursos'; // Cambiar al nombre de tu base de datos

// Conexión a la base de datos
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres a utf8
$conexion->set_charset("utf8");

// Inicializar la respuesta
$response = array();

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $cupos = $_POST['cupos'];

    // Validar que se hayan proporcionado valores válidos
    if (!empty($fecha) && !empty($cupos)) {
        // Escapar variables para evitar inyección SQL (opcional, dependiendo de tu implementación)
        $fecha = mysqli_real_escape_string($conexion, $fecha);
        $cupos = mysqli_real_escape_string($conexion, $cupos);

        // Construir el nombre de la columna dinámicamente
        $columna_cupos = "cupos_" . str_replace('-', '_', $fecha); // Transforma "-" en "_"

        // Preparar la consulta SQL para actualizar los cupos
        $sql = "UPDATE cursos SET `$columna_cupos` = ? WHERE id = 1"; // Utiliza comillas invertidas para escapar el nombre de la columna

        // Preparar la declaración
        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt === false) {
            $response['success'] = false;
            $response['message'] = 'Error en la preparación de la consulta SQL: ' . mysqli_error($conexion);
        } else {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "i", $cupos);

            // Ejecutar la declaración
            mysqli_stmt_execute($stmt);

            // Verificar si se actualizó correctamente
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $response['success'] = true;
                $response['message'] = "Se han actualizado los cupos correctamente para la fecha $fecha";
                $response['popup_message'] = "¡Cupos actualizados para la fecha $fecha!";
            } else {
                $response['success'] = false;
                $response['message'] = "No se pudo actualizar los cupos para la fecha $fecha";
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Por favor, seleccione la fecha y la cantidad de cupos.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Retornar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>