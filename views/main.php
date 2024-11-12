<?php
if (isset($eventos)) {
    echo '<pre>';
    print_r($eventos);
    echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA FIGUERES</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<!-- Navbar minimalista con logo -->
<nav class="navbar">
    <div class="navbar-container">
        <a href="#" class="navbar-brand">
            <img src="/public/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <ul class="navbar-links">
            <li><a href="#inicio"><i class="bi bi-search"></i></a></li>
            <li><a href="/views/perfil.php"><i class="bi bi-person-fill"></i></a></li>
            <li><a href="/views/logout.php" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="perfil.php"><i class="bi bi-person-fill"></i></a></li>
                <li><a href="logout.php" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a></li>
                <li><a href="login.php" title="Iniciar Sesión"><i class="bi bi-box-arrow-in-right"></i></a></li>
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
                    <img src="/public/img/rambla.jpg" class="d-block w-100" alt="Slider 1">
                </div>
                <div class="carousel-item">
                    <img src="/public/img/museudali.jpg" class="d-block w-100" alt="Slider 2">
                </div>
                <div class="carousel-item">
                    <img src="/public/img/castellstferran.jpg" class="d-block w-100" alt="Slider 3">
                </div>
            </div>
        </div>

        <div class="about-content">
            <div class="about-text">
                <h2>AGENDA FIGUERES SOSTENIBLE</h2>
                <p>Bienvenidos a nuestra plataforma de eventos locales, un espacio dedicado a conectar a la comunidad a través de experiencias significativas y enriquecedoras. Nos especializamos en:</p>
                <ul>
                    <li>Eventos al aire libre y actividades deportivas</li>
                    <li>Charlas y conferencias educativas</li>
                    <li>Jornadas culturales y comunitarias</li>
                    <li>Actividades familiares y recreativas</li>
                </ul>
                <p>Nuestro objetivo es crear un punto de encuentro donde los miembros de la comunidad puedan descubrir, participar y compartir experiencias únicas que enriquezcan nuestra vida local.</p>
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
<div class="soon_Events" id="eventos">
    <h2>Próximos Eventos</h2>
</div>
<?php if (!empty($eventos)): ?>
    <div class="eventos-grid" id="eventos">
        <?php foreach ($eventos as $evento): ?>
            <div class="evento-card">
                <img src="<?php echo htmlspecialchars($evento['url_imatge'] ?? 'default.png'); ?>" 
                     alt="<?php echo htmlspecialchars($evento['titol'] ?? ''); ?>">
                
                <div class="evento-info">
                    <h3><?php echo htmlspecialchars($evento['titol'] ?? ''); ?></h3>
                    <p class="fecha">
                        <?php echo htmlspecialchars($evento['data'] ?? '') . ' - ' . 
                                   htmlspecialchars($evento['hora'] ?? ''); ?>
                    </p>
                    <p class="descripcion">
                        <?php echo htmlspecialchars($evento['descripcio'] ?? ''); ?>
                    </p>
                    <a href="more_events.php?id=<?php echo $evento['id_esdev']; ?>" 
                       class="btn-evento">Ver más</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No hay eventos disponibles.</p>
<?php endif; ?>



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

    <script>
        $(document).ready(function() {
            function checkScreenSize() {
                if (window.matchMedia("(max-width: 768px)").matches) {
                    $('.scroll-arrow').hide();
                } else {
                    $('.scroll-arrow').show();
                }
            }

            // Ejecutar al cargar la página
            checkScreenSize();

            // Ejecutar cuando se redimensione la ventana
            $(window).resize(function() {
                checkScreenSize();
            });
        });

        $(document).ready(function() {
        function checkScreenSize() {
            if (window.matchMedia("(max-width: 768px)").matches) {
                $('.scroll-arrow').hide();
                $('.carousel-indicators').hide(); // Añadido para ocultar los indicadores
            } else {
                $('.scroll-arrow').show();
                $('.carousel-indicators').show(); // Añadido para mostrar los indicadores
            }
        }

        // Ejecutar al cargar la página
        checkScreenSize();

        // Ejecutar cuando se redimensione la ventana
        $(window).resize(function() {
            checkScreenSize();
        });
    });

    $(document).ready(function() {
    // Funcionalidad del scroll y carousel
    function checkScreenSize() {
        if (window.matchMedia("(max-width: 768px)").matches) {
            $('.scroll-arrow').hide();
            $('.carousel-indicators').hide();
        } else {
            $('.scroll-arrow').show();
            $('.carousel-indicators').show();
        }
    }

    checkScreenSize();
    $(window).resize(checkScreenSize);

    // Funcionalidad del footer acordeón
    $('.footer-section h5').on('click', function(e) {
        if (window.matchMedia("(max-width: 768px)").matches) {
            const $section = $(this).parent();
            
            // No aplicar a la sección de redes sociales
            if (!$section.find('.social-icons').length) {
                e.preventDefault();
                
                // Cerrar todas las otras secciones
                $('.footer-section').not($section).removeClass('active');
                
                // Toggle la sección actual
                $section.toggleClass('active');
            }
        }
    });
});
    </script>
</body>
</html>