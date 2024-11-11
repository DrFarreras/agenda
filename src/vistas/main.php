
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA FIGUERES</title>
    <link rel="stylesheet" href="/src/css/style-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!--inluim el nav  -->
    
    <?php include 'C:\Users\farre\Desktop\CLASE\agendafigueres\src\vistas\navbar.php'; ?>


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
                    <img src="/src/img/rambla.jpg" class="d-block w-100" alt="Slider 1">
                </div>
                <div class="carousel-item">
                    <img src="/src/img/museudali.jpg" class="d-block w-100" alt="Slider 2">
                </div>
                <div class="carousel-item">
                    <img src="/src/img/castellstferran.jpg" class="d-block w-100" alt="Slider 3">
                </div>
            </div>
        </div>

        <div class="about-content">
            <div class="about-text">
                <h2>AGENDA FIGUERES</h2>
                <p>Agenda Figueres neix amb el propòsit de compartir events locals de la nostra ciutat, Figueres. Busquem connectar amb la nostra comunitat a través d'experiències significatives i divertides.</p>
                <ul>
                    <li>Events al aire lliure i activitats esportives</li>
                    <li>Xerrades i conferències educatives</li>
                    <li>Jornades culturals i comunitàries</li>
                    <li>Activitats familiars i recreatives</li>
                </ul>
                <p>Uneix-te a la nostra comunitat per a poder descobrir, participar i compartir experiències úniques i educatives que ens uneixin.</p>
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

<?php if (!empty($eventos)): ?>
    <div class="eventos-grid" id="eventos">
        <?php foreach ($eventos as $evento): ?>
            <div class="evento-card">
                <img src="img/<?php echo htmlspecialchars($evento['imatge'] ?? 'default.png'); ?>" 
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
                    <a href="evento.php?id=<?php echo $evento['id_esdev']; ?>" 
                       class="btn-evento">Veure més</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No hi ha events disponibles.</p>
<?php endif; ?>

<!-- footer -->
<?php include 'C:\Users\farre\Desktop\CLASE\agendafigueres\src\vistas\footer.php'; ?>


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