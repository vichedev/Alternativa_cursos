<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/font-size/font-size.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo_render.png" alt="Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#curso">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Sobre Nosotros</a>
                    </li>
                </ul>
            </div>
            <a href="https://walink.co/eb55e3" class="btn btn-contact d-none d-lg-block" type="button"
                target="_blank">Contactar</a>
        </div>
    </nav>





    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 content">
                    <h1 class="display-4">APRENDE CON RED NUEVA CONEXIÓN</h1>
                    <p class="lead d-none d-md-block">Aquí puedes encontrar cursos presenciales y online!</p>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/img/slider2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/slider1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/slider3.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Courses Section -->
    <section class="card-section text-center" id="curso">
        <div class="container">
            <h2 class="display-4">Nuestros Cursos</h2>
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
    <section class="about-section text-center" id="nosotros">
        <div class="container">
            <h2 class="display-4">Sobre Nosotros</h2>
            <br>
            <p class="lead">
                Somos una plataforma dedicada a ofrecer los mejores cursos presenciales y en línea para ayudarte a
                alcanzar tus metas profesionales y personales en el área de telecomunicaciones.
                <br><br>
                Nuestra misión es proporcionar una educación de calidad que se adapte a las necesidades del mercado
                actual. Contamos con un equipo de expertos con amplia experiencia en el sector que te guiarán a través
                de un aprendizaje práctico y actualizado.
                <br><br>
                Además, ofrecemos una variedad de recursos y herramientas para facilitar tu proceso de aprendizaje.
                Desde materiales de estudio interactivos hasta soporte en tiempo real, estamos aquí para asegurarnos de
                que obtengas el máximo provecho de cada curso.
            </p>
            <img src="assets/img/logo_render.png" alt="Imagen Sobre Nosotros" class="img-fluid mt-4"
                style="max-width: 90%; height: auto;">
        </div>
    </section>


    <!-- Professors Section -->
    <section class="professor-section text-center py-5">
        <div class="container">
            <h2 class="mb-5  display-4">Nuestros Entrenadores</h2>
            <div class=" row justify-content-center">
                <div class="col-md-4">
                    <div class="card professor-card">
                        <img src="assets/img/docente1.png" class="card-img-top" alt="Ing. Manuel Tandazo Mera">
                        <div class="card-body">
                            <h5 class="card-title">Ing. Manuel Tandazo Mera</h5>
                            <p class="card-text">Especialista en Redes y Gestión de Equipos MikroTik</p>
                            <p class="card-description">El Ing. Manuel Tandazo Mera es un experto en redes y gestión de
                                equipos MikroTik, con 9 años de experiencia en el campo. Presta servicios de soporte
                                técnico a empresas de telecomunicaciones y es profesor en su área de especialización,
                                brindando capacitación avanzada en redes y equipos MikroTik, garantizando un buen
                                mantenimiento de las redes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card professor-card">
                        <img src="assets/img/docente2.png" class="card-img-top" alt="Ing. Humberto Barco Escobar">
                        <div class="card-body">
                            <h5 class="card-title">Ing. Humberto Barco Escobar</h5>
                            <p class="card-text">Especialista en Fibra Óptica</p>
                            <p class="card-description">Experto en fibra óptica,
                                con una sólida trayectoria en el campo técnico. Se especializa en el tendido de fibra,
                                armado de cajas, y otros aspectos críticos relacionados con la instalación y
                                mantenimiento de redes de fibra óptica. Su amplia experiencia incluye la gestión de
                                proyectos y desafíos técnicos para garantizar el mejor
                                rendimiento en las infraestructuras de telecomunicaciones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer 2 - Bootstrap Brain Component -->
    <footer class="footer">

        <!-- Widgets - Bootstrap Brain Component -->
        <section class=" py-4 py-md-5 py-xl-8 border-top border-light">
            <div class="container overflow-hidden">
                <div class="row gy-4 gy-lg-0 justify-content-xl-between">
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <div class="widget">
                            <a href="#!">
                                <img src="assets/img/logo_render.png" alt="BootstrapBrain Logo" width="295"
                                    height="100">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Link de interes</h4>
                            <address class="mb-4">Auspiciado por Red nueva conexión</address>
                            <p class="mb-1">
                                <a class="link-secondary text-decoration-none"
                                    href="https://www.rednuevaconexion.net/">WEB OFICIAL RNC</a>
                            </p>
                            <p class="mb-0">
                                <a class="link-secondary text-decoration-none"
                                    href="mailto:info@rednuevaconexion.net">info@rednuevaconexion.net</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-xl-4">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Chatea con nosotros! Resolveremos tus dudas.</h4>
                            <p class="mb-4">Dale click al boton y te atenderemos!</p>
                            <a href="https://walink.co/eb55e3" class="btn btn-success" target="_blank"
                                rel="noopener noreferrer">
                                Chat on WhatsApp
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Copyright - Bootstrap Brain Component -->
        <div class=" py-4 py-md-5 py-xl-8 border-top border-light-subtle">
            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-0 align-items-md-center">
                    <div class="col-xs-12 col-md-7 order-1 order-md-0">
                        <div class="copyright text-center text-md-start">
                            &copy; 2024. Todos los derechos reservados.
                        </div>
                        <div class="credits text-secondary text-center text-md-start mt-2 fs-8">
                            Desarrollado por <a href="#" class="link-secondary text-decoration-none">InigualitySoft</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-5 order-0 order-md-1">
                        <div class="social-media-wrapper">
                            <ul class="list-unstyled m-0 p-0 d-flex justify-content-center justify-content-md-end">
                                <li class="me-3">
                                    <a href="https://www.facebook.com/rednuevaconexion/"
                                        class="link-dark link-opacity-75-hover" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="assets/img/facebook.png" alt="Facebook" width="40" height="40">
                                    </a>
                                </li>

                                <li class="me-3">
                                    <a href="https://www.instagram.com/rednuevaconexion.ec/?hl=es"
                                        class="link-dark link-opacity-75-hover" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="assets/img/instagram.png" alt="Instagram" width="40" height="40">
                                    </a>
                                </li>

                                <!-- Agrega más íconos aquí si es necesario -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>





    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
    // Initialize the carousel with a one-second interval
    var myCarousel = document.querySelector('#carouselExampleIndicators');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000
    });
    </script>

    <!-- Back to Top Button -->
    <button id="backToTopBtn" class="btn btn-primary">
        ↑
    </button>

    <script>
    // Mostrar el botón cuando el usuario se desplaza hacia abajo 100px desde la parte superior de la página
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("backToTopBtn").style.display = "block";
        } else {
            document.getElementById("backToTopBtn").style.display = "none";
        }
    }

    // Cuando el usuario hace clic en el botón, se desplaza hacia arriba hasta el inicio de la página
    document.getElementById("backToTopBtn").onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };
    </script>


</body>

</html>