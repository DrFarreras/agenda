<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA FIGUERES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<!-- Navbar minimalista con logo -->
<nav class="navbar">
    <div class="navbar-container">
        <a href="#" class="navbar-brand">
            <img src="/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <ul class="navbar-links">
            <li><a href="#inicio"><i class="bi bi-search"></i></a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <!-- Menú de usuario logueado -->
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (!empty($_SESSION['user']['profile_img'])): ?>
                            <img src="<?= $_SESSION['user']['profile_img'] ?>" alt="Foto de perfil" width="32" height="32" class="rounded-circle">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="32" height="32">
                                <circle cx="100" cy="100" r="100" fill="#1F2937" />
                                <circle cx="100" cy="85" r="35" fill="#F9FAFB" />
                                <path d="M100 125 C40 125, 40 200, 40 200 L160 200 C160 200, 160 125, 100 125" fill="#F9FAFB" />
                            </svg>
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <?php if ($_SESSION['user']['role'] === 'administrator'): ?>
                            <li><a class="dropdown-item" href="index.php?r=dashboard">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="index.php?r=profile">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?r=dologout">Cerrar sesión</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <li><a href="/?r=login" title="Iniciar Sesión"><i class="bi bi-box-arrow-in-right"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

    <!-- Contenido principal -->
    <div class="about-section">
        <div id="carouselAbout" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
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
                    <img src="/img/museudali-figueres.jpg" class="d-block w-100" alt="Museo Dalí Figueres">
                </div>
                <div class="carousel-item">
                    <img src="/img/castellstferran.jpg" class="d-block w-100" alt="Castell Sant Ferran">
                </div>
            </div>
        </div>
        
       <!-- Añadir la flecha animada -->
    <div class="scroll-arrow">
        <a href="#eventos" class="scroll-down">
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>

<br>

<br>
    <!-- Footer -->
    <footer class="footer bg-light py-3">
    <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5>Navegación</h5>
                    <ul>
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#eventos">Eventos</a></li>
                        <li><a href="/public/aboutus.php/">Sobre Nosotros</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h5>Eventos</h5>
                    <ul>
                        <li><a href="#">Próximos Eventos</a></li>
                        <li><a href="#">Eventos Destacados</a></li>
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Archivo</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h5>Contacto</h5>
                    <ul>
                        <li><a href="#"><i class="bi bi-envelope-open-fill"></i> secretaria@cendrassos.net</a></li>
                        <li><a href="#"><i class="bi bi-telephone-fill"></i> +34 972 50 79 08</a></li>
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> C/ Pelai Martínez, 1, 17600 Figueres, Girona</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-section">        <div class="social-icons">
                <a href="https://www.instagram.com/inscendrassos/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://es-es.facebook.com/institutcendrassos"><i class="bi bi-facebook"></i></a>
                <a href="https://x.com/cendrassos?lang=es"><i class="bi bi-twitter"></i></a>
                </div>
                
                <div class="footer-bottom">
            <span>© 2024 Agenda Sostenible Figueres</span>
        </div>
            </div>
        </div>  
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>