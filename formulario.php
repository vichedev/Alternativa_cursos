<?php
require_once('includes/db.php');

// Verificar si se recibieron fecha y curso_id por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['fecha']) || !isset($_POST['curso_id'])) {
        die("Error: Fecha o ID del curso no seleccionados.");
    }
    $fecha = $_POST['fecha'];
    $curso_id = $_POST['curso_id'];

    // Consultar la cantidad de cupos disponibles para el 3 de agosto y 10 de agosto
    $query_cupos = "SELECT cupos_3_agosto, cupos_10_agosto FROM cursos WHERE id = $curso_id";
    $result_cupos = mysqli_query($conexion, $query_cupos);

    if ($result_cupos && mysqli_num_rows($result_cupos) > 0) {
        $row = mysqli_fetch_assoc($result_cupos);
        $cupos_3_agosto = $row['cupos_3_agosto'];
        $cupos_10_agosto = $row['cupos_10_agosto'];
    } else {
        die("Error al obtener los cupos disponibles para esta fecha.");
    }
} else {
    // Si no es una solicitud POST, redirigir o manejar según tu lógica de aplicación
    die("Acceso denegado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción al Curso</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
    .carousel-item img {
        width: 100%;
        height: 400px;
        /* Ajusta la altura según tus necesidades */
        object-fit: cover;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Formulario de Inscripción -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title">Inscripción al Curso</h1>
                        <h3>Fecha seleccionada: <?php echo date('j F Y', strtotime($fecha)); ?></h3>

                        <h3>Cupos disponibles:</h3>
                        <?php if ($fecha == '2024-08-03'): ?>
                        <p>Cupos para el 3 de agosto: <?php echo $cupos_3_agosto; ?></p>
                        <?php elseif ($fecha == '2024-08-10'): ?>
                        <p>Cupos para el 10 de agosto: <?php echo $cupos_10_agosto; ?></p>
                        <?php endif; ?>

                        <form action="procesar.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="fecha" value="<?php echo htmlspecialchars($fecha); ?>">
                            <input type="hidden" name="curso_id" value="<?php echo htmlspecialchars($curso_id); ?>">

                            <div class="mb-3">
                                <label for="nombres" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" required>
                            </div>
                            <div class="mb-3">
                                <label for="archivo_cedula" class="form-label">Adjuntar PDF de Cédula</label>
                                <input type="file" class="form-control" id="archivo_cedula" name="archivo_cedula"
                                    accept=".pdf" required>
                            </div>
                            <div class="mb-3">
                                <label for="archivo_placa" class="form-label">Adjuntar Foto de Placa del Carro</label>
                                <input type="file" class="form-control" id="archivo_placa" name="archivo_placa"
                                    accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="archivo_pago" class="form-label">Adjuntar Foto de Comprobante de
                                    Pago</label>
                                <input type="file" class="form-control" id="archivo_pago" name="archivo_pago"
                                    accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar Inscripción</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Carousel de Imágenes -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Imagen 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Curso Avanzado de Gestión y Resolución de Problemas de Red</h5>
                                <p>Descripción del curso y detalles relevantes.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Imagen 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Curso Avanzado de Gestión y Resolución de Problemas de Red</h5>
                                <p>Ing Manuel Tandazo Mera</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Imagen 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Curso Avanzado de Gestión y Resolución de Problemas de Red</h5>
                                <p>Explora y domina los fundamentos esenciales de la gestión de redes en nuestro curso
                                    avanzado. Aprende a detectar y resolver problemas reales en entornos de red, desde
                                    VLANs hasta segmentación de IPs. Domina el manejo efectivo de DNS y DHCP, y adquiere
                                    habilidades prácticas para configurar y optimizar redes LAN. Ideal para
                                    profesionales en TI y administradores de red que buscan ampliar sus conocimientos y
                                    habilidades técnicas..</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
    // Activar movimiento automático del Carousel
    $('.carousel').carousel({
        interval: 1000 // Cambia cada 3 segundos
    });
    </script>
</body>

</html>