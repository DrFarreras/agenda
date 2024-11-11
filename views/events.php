<?php
include_once __DIR__ . '/../models/imagespdo.php'; // Adjust the path as necessary

$config = require __DIR__ . '/../config/db.php'; // Assuming you have a db config file
$usuarisPDO = new \Daw\UsuarisPDO($config);

try {
    $eventos = $usuarisPDO->getAllEvents(); // Assuming this method exists in your model
} catch (Exception $e) {
    $eventos = [];
    echo "Error fetching events: " . $e->getMessage();
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
        <a href="main.php" class="navbar-brand">
            <img src="/public/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <ul class="navbar-links">
            <li><a href="#inicio"><i class="bi bi-search"></i></a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="perfil.php"><i class="bi bi-person-fill"></i></a></li>
                <li><a href="logout.php" title="Cerrar Sesión"><i class="bi bi-box-arrow-right"></i></a></li>
            <?php else: ?>
                <li><a href="login.php" title="Perfil"><i class="bi bi-person-fill"></i></i></a></li>
                <li><a href="login.php" title="Iniciar Sesión"><i class="bi bi-box-arrow-in-right"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

 
<br>
<div class="filter-container">
    <div class="filter-buttons">
        <button class="filter-btn active" data-filter="all">Todos</button>
        <button class="filter-btn" data-filter="cultural">Culturales</button>
        <button class="filter-btn" data-filter="deportivo">Deportivos</button>
        <button class="filter-btn" data-filter="musical">Musicales</button>
    </div>
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
                        <li><a href="#"><i class="bi bi-envelope-open-fill"></i> Email</a></li>
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