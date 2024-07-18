<?php
session_start();

require_once('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT id, usuario, contrasena FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body>

<main class="form-signin text-center">
    <img class="mb-4" src="../assets/images/logo.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 fw-normal">Login - Admin</h1>

    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-floating">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required autofocus>
            <label for="usuario">Usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
            <label for="contrasena">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Iniciar Sesión</button>
    </form>
</main>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
