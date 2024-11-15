<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA FIGUERES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Contenido principal -->
    <div class="about-section container-fluid">
        <div id="carouselAbout" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1800">
            <!-- Añadir los indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/museudali2.jpg" class="d-block w-100" alt="Museo Dalí">
                </div>
                <div class="carousel-item">
                    <img src="/img/rambla.jpg" class="d-block w-100" alt="Museo Dalí Figueres">
                </div>
                <div class="carousel-item">
                    <img src="/img/castellstferran.jpg" class="d-block w-100" alt="Castell Sant Ferran">
                </div>
            </div>
        </div>
    </div>

    <!-- Flecha animada -->
    <div class="scroll-arrow text-center">
    <a href="#agendafigueres" class="scroll-down">
        <i class="bi bi-chevron-down"></i>
    </a>
    </div>

    <!-- Sección de agenda -->
    <div class="class-space container my-5" id="agendafigueres">
        <h2 class="text-center">AGENDA FIGUERES SOSTENIBLE</h2>
        <p class="text-center">Nos dedicamos a informar y mantener a nuestra comunidad actualizada sobre los eventos, anuncios y actividades más relevantes de Figueres. Nuestro compromiso es conectar a los ciudadanos con iniciativas y eventos sostenibles, culturales, y comunitarios, fomentando así un estilo de vida más consciente y en armonía con el entorno. Con nosotros, estarás al tanto de todo lo que sucede en Figueres y sus alrededores para que puedas participar y disfrutar de lo que nuestra ciudad tiene para ofrecer. ¡Súmate y descubre todo lo que Figueres tiene para ti!</p>
    </div>

    <!-- Botón de eventos -->
    <div class="d-flex justify-content-center align-items-center mb-5">
        <a href="index.php?r=eventos" class="btn btn-eventos">Cargar Eventos</a>                            
    </div>

    <!-- Footer -->
    <footer class="footer bg-light py-3">
        <div class="container">
            <div class="footer-content row">
                <div class="footer-section col-md-3">
                    <h5>Navegación</h5>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="index.php?r=eventos">Eventos</a></li>
                        <li><a href="index.php?r=aboutus">Sobre Nosotros</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-section col-md-3">
                    <h5>Eventos</h5>
                    <ul>
                        <li><a href="#">Próximos Eventos</a></li>
                        <li><a href="#">Eventos Destacados</a></li>
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Archivo</a></li>
                    </ul>
                </div>
                <div class="footer-section col-md-3">
                    <h5>Contacto</h5>
                    <ul>
                        <li><a href="#"><i class="bi bi-envelope-open-fill"></i> secretaria@cendrassos.net</a></li>
                        <li><a href="#"><i class="bi bi-telephone-fill"></i> +34 972 50 79 08</a></li>
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> C/ Pelai Martínez, 1, 17600 Figueres, Girona</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section col-md-3">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/inscendrassos/?hl=es"><i class="bi bi-instagram"></i></a>
                        <a href="https://es-es.facebook.com/institutcendrassos"><i class="bi bi-facebook"></i></a>
                        <a href="https://x.com/cendrassos?lang=es"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center mt-3">
                <span>© 2024 Agenda Sostenible Figueres</span>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>