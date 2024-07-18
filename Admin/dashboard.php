<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require_once('../includes/db.php'); // Ajustar la ruta según sea necesario

// Obtener la fecha seleccionada de la URL (por defecto 3 de agosto)
$fecha_seleccionada = $_GET['fecha'] ?? '2024-08-03';

// Verificar si la fecha seleccionada es válida
$fechas_validas = ['2024-08-03', '2024-08-10'];
if (!in_array($fecha_seleccionada, $fechas_validas)) {
    die("Fecha no válida.");
}

// Consultar los estudiantes inscritos en la fecha seleccionada
$query = "SELECT nombres, apellidos, correo, telefono, cedula, fecha_inscripcion, archivo_cedula, archivo_placa, archivo_pago 
          FROM inscripciones 
          WHERE fecha_curso = '$fecha_seleccionada' 
          ORDER BY fecha_inscripcion DESC";

$result = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de cursos RNC</title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
    <link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
    <link rel="stylesheet" href="css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="with-side-menu control-panel control-panel-compact">

    <header class="site-header">
        <div class="container-fluid">

            <a href="#" class="site-logo">
                <img class="hidden-md-down" src="img/logo-2.png" alt="">
                <img class="hidden-lg-up" src="img/logo-2-mob.png" alt="">
            </a>

            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>

            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">

                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon glyphicon glyphicon-cog"></span>Configuraciones</a>
                                <a class="dropdown-item" href="#"><span
                                        class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><span
                                        class="font-icon glyphicon glyphicon-log-out"></span>Cerrar</a>
                            </div>
                        </div>
                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div>
                    <!--.site-header-shown-->

                </div>
                <!--site-header-content-in-->
            </div>
            <!--.site-header-content-->
        </div>
        <!--.container-fluid-->
    </header>
    <!--.site-header-->

    <div class="mobile-menu-left-overlay"></div>

    <!-- MENU LATERAL -->
    <nav class="side-menu">
        <ul class="side-menu-list">
            <!-- ZONA DEL SLIDER -->
            <!-- Ver estudiantes -->
            <li class="grey with-sub">
                <span>
                    <i class="font-icon font-icon-dashboard"></i>
                    <span class="lbl">CURSO DE MIKROTIK</span>
                </span>
                <ul>
                    <li><a class="nav-link <?php echo ($fecha_seleccionada == '2024-08-03') ? 'active' : ''; ?>"
                            href="dashboard.php?fecha=2024-08-03">
                            Estudiantes - 3 de Agosto
                        </a></li>
                    <li><a class="nav-link <?php echo ($fecha_seleccionada == '2024-08-10') ? 'active' : ''; ?>"
                            href="dashboard.php?fecha=2024-08-10">
                            Estudiantes - 10 de Agosto
                        </a></li>
                </ul>
            </li>
        </ul>

        <section>
            <header class="side-menu-title">Configuraciones</header>
            <ul class="side-menu-list">
                <li>
                    <a href="logout.php">
                        <i class="tag-color red"></i>
                        <span class="lbl">Cerrar Sesion</span>
                    </a>
                </li>
            </ul>
        </section>
    </nav>
    <!--.side-menu-->
    <!-- FINAL DEL MENU LATERAL -->

    <!-- ZONA DEL CONTENIDO -->
    <div class="page-content">
        <div class="container-fluid">
            <!-- ZONA DE VER QUE ESTA PASANDO -->

            <!--.row-->
            <!-- FIN DE ZONA -->

            <!-- ZONA DE TABLAS -->
            <div class="row">
                <div class=" dahsboard-column">
                    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
                        <div class="row">
                            <!-- Columna izquierda para el formulario -->
                            <div class="col-md-6">
                                <header class="box-typical-header panel-heading">
                                    <h3 class="panel-title">Gestión de cupos para Curso de Mikrotik por fecha</h3>
                                </header>
                                <div class="box-typical-body panel-body">
                                    <div class="container mt-5">
                                        <!-- Formulario para agregar cupos -->
                                        <form id="form-agregar-cupos" action="actualizar_cupos.php" method="post">
                                            <div class="form-group">
                                                <label for="fecha">Seleccione la fecha:</label>
                                                <select class="form-control" id="fecha" name="fecha" required>
                                                    <option value="3_agosto">3 de Agosto</option>
                                                    <option value="10_agosto">10 de Agosto</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cupos">Cupos disponibles:</label>
                                                <input type="number" class="form-control" id="cupos" name="cupos"
                                                    min="0" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Agregar Cupos</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna derecha para los indicadores de actualización y cupos -->
                            <div class="col-md-6">
                                <header class="box-typical-header panel-heading">
                                    <h3 class="panel-title">Indicadores de actualización de cupos</h3>
                                </header>
                                <div class="box-typical-body panel-body">
                                    <div id="indicadores-actualizacion">
                                        <!-- Aquí se mostrarán los indicadores dinámicamente -->
                                    </div>
                                    <div class="mt-3">
                                        <!-- Mostrar los cupos en tiempo real -->
                                        <label for="cupos_3_agosto">Cupos 3 de Agosto:</label>
                                        <span
                                            id="cupos_3_agosto"><?php echo obtenerCupos('cupos_3_agosto'); ?></span><br>
                                        <label for="cupos_10_agosto">Cupos 10 de Agosto:</label>
                                        <span id="cupos_10_agosto"><?php echo obtenerCupos('cupos_10_agosto'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--.row-->
                    </section>

                    <!-- pruebas -->
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
            $response = array(
                'success' => false,
                'message' => 'Error en la preparación de la consulta SQL: ' . mysqli_error($conexion)
            );
        } else {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "i", $cupos);

            // Ejecutar la declaración
            mysqli_stmt_execute($stmt);

            // Verificar si se actualizó correctamente
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                // Actualizar los cupos obteniendo los valores actuales
                $cupos_3_agosto = obtenerCupos('cupos_3_agosto');
                $cupos_10_agosto = obtenerCupos('cupos_10_agosto');

                // Crear un array para la respuesta JSON
                $response = array(
                    'success' => true,
                    'message' => "Se han actualizado los cupos correctamente para la fecha $fecha",
                    'popup_message' => "Se han actualizado los cupos correctamente para la fecha $fecha",
                    'cupos_3_agosto' => $cupos_3_agosto,
                    'cupos_10_agosto' => $cupos_10_agosto
                );
            } else {
                // Crear un array para la respuesta JSON
                $response = array(
                    'success' => false,
                    'message' => "No se pudo actualizar los cupos para la fecha $fecha"
                );
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        }
    } else {
        // Crear un array para la respuesta JSON
        $response = array(
            'success' => false,
            'message' => "Por favor, seleccione la fecha y la cantidad de cupos."
        );
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Retornar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Función para obtener los cupos de una columna específica
function obtenerCupos($columna)
{
    global $conexion;

    // Consulta SQL para obtener los cupos de la columna especificada
    $sql = "SELECT $columna FROM cursos WHERE id = 1"; // Ajusta 'id' según la estructura de tu tabla

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        return $fila[$columna];
    } else {
        return 'Error al obtener los cupos';
    }
}
?>

                    <!-- pruebas -->

                    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
                        <header class="box-typical-header panel-heading">
                            <h3 class="panel-title">ESTUDIANTES INSCRITOS PARA EL CURSO EL
                                <?php echo date('j F Y', strtotime($fecha_seleccionada)); ?></h3>
                        </header>
                        <div class="box-typical-body panel-body">
                            <table class="tbl-typical">
                                <thead>
                                    <tr>
                                        <th>
                                            <div>Nombres</div>
                                        </th>
                                        <th>
                                            <div>Apellidos</div>
                                        </th>
                                        <th align="center">
                                            <div>Correo</div>
                                        </th>
                                        <th align="center">
                                            <div>Telefono</div>
                                        </th>
                                        <th align="center">
                                            <div>Cédula</div>
                                        </th>
                                        <th align="center">
                                            <div>Fecha de Inscripción</div>
                                        </th>
                                        <th align="center">
                                            <div>Archivo de Cedula</div>
                                        </th>
                                        <th align="center">
                                            <div>Archivo Placa</div>
                                        </th>
                                        <th align="center">
                                            <div>Archivo de Pago</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>{$row['nombres']}</td>
                                    <td>{$row['apellidos']}</td>
                                    <td>{$row['correo']}</td>
                                    <td>{$row['telefono']}</td>
                                    <td>{$row['cedula']}</td>
                                    <td>{$row['fecha_inscripcion']}</td>
                                    <td><a href='../uploads/{$row['archivo_cedula']}' target='_blank'>Ver Archivo</a></td>
                                    <td><a href='../uploads/{$row['archivo_placa']}' target='_blank'>Ver Archivo</a></td>
                                    <td><a href='../uploads/{$row['archivo_pago']}' target='_blank'>Ver Archivo</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No hay inscripciones para esta fecha.</td></tr>";
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                        <!--.box-typical-body-->
                    </section>


                    <!--.box-typical-dashboard-->
                </div>
                <!--.col-->

            </div>
            <!-- FIN  -->
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->
    <!-- FIN DE LA ZONA DEL CONTENIDO -->

    <!-- ZONA EXTRA PARA FUTURO -->
    <div class="control-panel-container">
        <ul>
            <li class="tasks">
                <div class="control-item-header">
                    <a href="#" class="icon-toggle">
                        <span class="caret-down fa fa-caret-down"></span>
                        <span class="icon fa fa-tasks"></span>
                    </a>
                    <span class="text">Proximamente</span>
                    <div class="actions">
                        <a href="#">
                            <span class="fa fa-refresh"></span>
                        </a>
                        <a href="#">
                            <span class="fa fa-cog"></span>
                        </a>
                        <a href="#">
                            <span class="fa fa-trash"></span>
                        </a>
                    </div>
                </div>
                <div class="control-item-content">
                    <div class="control-item-content-text">Función aun no disponible</div>
                </div>
            </li>

        </ul>
        <a class="control-panel-toggle">
            <span class="fa fa-angle-double-left"></span>
        </a>
    </div>
    <!-- FIN DE ZONA -->


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selección del formulario y manejo de envío
        var form = document.getElementById('form-agregar-cupos');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar envío estándar del formulario

            // Realizar la solicitud AJAX
            var formData = new FormData(form);
            fetch('actualizar_cupos.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Limpiar los indicadores de actualización
                    var indicadoresDiv = document.getElementById('indicadores-actualizacion');
                    indicadoresDiv.innerHTML = '';

                    // Crear un elemento para mostrar el mensaje
                    var mensajeDiv = document.createElement('div');
                    mensajeDiv.classList.add('alert', 'alert-info');
                    mensajeDiv.textContent = data.message;

                    // Agregar el mensaje al contenedor de indicadores
                    indicadoresDiv.appendChild(mensajeDiv);

                    // Recargar la página después de 2 segundos si la actualización fue exitosa
                    if (data.success) {
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // 2000 milisegundos = 2 segundos
                    }
                })
                .catch(error => {
                    console.error('Error al actualizar los cupos:', error);
                    alert('Hubo un error al actualizar los cupos. Por favor, intenta de nuevo.');
                });
        });
    });
    </script>


    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/tether/tether.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>

    <script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
    $(document).ready(function() {

        $('.panel').lobiPanel({
            sortable: true
        });
        $('.panel').on('dragged.lobiPanel', function(ev, lobiPanel) {
            $('.dahsboard-column').matchHeight();
        });

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Day');
            dataTable.addColumn('number', 'Values');
            // A column for custom tooltip content
            dataTable.addColumn({
                type: 'string',
                role: 'tooltip',
                'p': {
                    'html': true
                }
            });
            dataTable.addRows([
                ['MON', 130, ' '],
                ['TUE', 130, '130'],
                ['WED', 180, '180'],
                ['THU', 175, '175'],
                ['FRI', 200, '200'],
                ['SAT', 170, '170'],
                ['SUN', 250, '250'],
                ['MON', 220, '220'],
                ['TUE', 220, ' ']
            ]);

            var options = {
                height: 314,
                legend: 'none',
                areaOpacity: 0.18,
                axisTitlesPosition: 'out',
                hAxis: {
                    title: '',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    textPosition: 'out'
                },
                vAxis: {
                    minValue: 0,
                    textPosition: 'out',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    baselineColor: '#16b4fc',
                    ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                    gridlines: {
                        color: '#1ba0fc',
                        count: 15
                    }
                },
                lineWidth: 2,
                colors: ['#fff'],
                curveType: 'function',
                pointSize: 5,
                pointShapeType: 'circle',
                pointFillColor: '#f00',
                backgroundColor: {
                    fill: '#008ffb',
                    strokeWidth: 0,
                },
                chartArea: {
                    left: 0,
                    top: 0,
                    width: '100%',
                    height: '100%'
                },
                fontSize: 11,
                fontName: 'Proxima Nova',
                tooltip: {
                    trigger: 'selection',
                    isHtml: true
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        }
        $(window).resize(function() {
            drawChart();
            setTimeout(function() {}, 1000);
        });
    });
    </script>
    <script src="js/app.js"></script>

</body>

</html>

<?php
mysqli_close($conexion);
?>