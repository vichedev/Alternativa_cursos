<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .card-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 30px;
        }
        .card-form h2, .card-form h3, .card-form p {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-form">
            <h1 class="text-center mb-4">¡Bienvenido a nuestro curso presencial!</h1>
            
            <h2>Curso Disponible</h2>
            <p>Curso Avanzado de Gestión y Resolución de Problemas de Red.</p>

            <h3>Elige una fecha disponible:</h3>
            <form action="formulario.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="curso_id" value="1"> <!-- Ajusta el valor según el curso seleccionado -->
                <div class="mb-3">
                    <label for="fecha" class="form-label">Selecciona una fecha:</label>
                    <select class="form-select" name="fecha" id="fecha" required>
                        <option value="2024-08-03">3 de agosto de 2024</option>
                        <option value="2024-08-10">10 de agosto de 2024</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Inscribirse</button>
            </form>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
