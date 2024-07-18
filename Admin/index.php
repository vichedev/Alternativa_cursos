<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Redirigir al dashboard una vez que el usuario esté autenticado
header("Location: dashboard.php");
exit;
?>
