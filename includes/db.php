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


$conexion->set_charset("utf8");


?>
