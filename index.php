<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 content">
                    <h1 class="display-4">Bienvenidos a Nuestro Sitio</h1>
                    <p class="lead">Aquí puedes encontrar los mejores cursos en línea.</p>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="card-section text-center">
        <div class="container">
            <h2>Nuestros Cursos</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso 1">
                        <div class="card-body">
                            <h5 class="card-title">Curso 1</h5>
                            <p class="card-text">Descripción del curso 1.</p>
                            <p class="card-text"><strong>Precio: $100</strong></p>
                            <a href="disponibilidad.php" class="btn btn-primary" target="_blank">Ir al curso!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso 2">
                        <div class="card-body">
                            <h5 class="card-title">Curso 2</h5>
                            <p class="card-text">Descripción del curso 2.</p>
                            <p class="card-text"><strong>Precio: $200</strong></p>
                            <a href="#" class="btn btn-primary">Ir al curso!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Curso 3">
                        <div class="card-body">
                            <h5 class="card-title">Curso 3</h5>
                            <p class="card-text">Descripción del curso 3.</p>
                            <p class="card-text"><strong>Precio: $300</strong></p>
                            <a href="#" class="btn btn-primary">Ir al curso!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section text-center">
        <div class="container">
            <h2>Sobre Nosotros</h2>
            <p class="lead">Somos una plataforma dedicada a ofrecer los mejores cursos en línea para ayudarte a alcanzar tus metas profesionales y personales.</p>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2>Encuéntranos</h2>
                    <div id="map" style="width: 100%; height: 300px; background-color: #ddd;"></div>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x300" alt="Mapa">
                </div>
            </div>
        </div>
    </section>

    <!-- Professors Section -->
    <section class="professor-section text-center">
        <div class="container">
            <h2>Nuestros Profesores</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/100" alt="Profesor 1">
                    <h5>Profesor 1</h5>
                    <p>Especialidad en Matemáticas</p>
                </div>
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/100" alt="Profesor 2">
                    <h5>Profesor 2</h5>
                    <p>Especialidad en Física</p>
                </div>
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/100" alt="Profesor 3">
                    <h5>Profesor 3</h5>
                    <p>Especialidad en Química</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Email: info@ejemplo.com</p>
                    <p>Teléfono: +123 456 7890</p>
                </div>
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <p><a href="#">Facebook</a></p>
                    <p><a href="#">Twitter</a></p>
                    <p><a href="#">Instagram</a></p>
                </div>
                <div class="col-md-4 text-center">
                    <h5>Logo</h5>
                    <img src="https://via.placeholder.com/100" alt="Logo">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <p>Desarrollado por [Tu Nombre]</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize the carousel with a one-second interval
        var myCarousel = document.querySelector('#carouselExampleIndicators');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 1000
        });
    </script>
</body>
</html>
