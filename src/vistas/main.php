<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA FIGUERES</title>
    <!-- Incloem els estils CSS externs -->
    <link rel="stylesheet" href="/src/css/style-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incloem els scripts de Bootstrap i jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- Incloem el nav -->
    <?php include '..\vistas\navbar.php'; ?>

    <!-- Contingut principal -->
    <div class="about-section">
        <div id="carouselAbout" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
            <!-- Afegim els indicadors del carrousel -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselAbout" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- Imatges del carrousel -->
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
                <!-- Descripció de l'agenda -->
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

    <!-- Afegim la fletxa animada -->
    <div class="scroll-arrow">
        <a href="#eventos" class="scroll-down">
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>

<br>

<!-- Comprovem si hi ha events per mostrar -->
<?php if (!empty($eventos)): ?>
    <div class="eventos-grid" id="eventos">
        <!-- Recorrem els events per mostrar-los -->
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

<!-- Footer -->
<?php include '..\vistas\footer.php'; ?>

<!-- Script per gestionar la visibilitat de la fletxa i els indicadors en funció de la mida de la pantalla -->
<script>
    $(document).ready(function() {
        function checkScreenSize() {
            // Si la pantalla té un ample màxim de 768px (pantalla petita)
            if (window.matchMedia("(max-width: 768px)").matches) {
                $('.scroll-arrow').hide();  // Ocultem la fletxa
                $('.carousel-indicators').hide(); // Ocultem els indicadors
            } else {
                $('.scroll-arrow').show();  // Mostrem la fletxa
                $('.carousel-indicators').show(); // Mostrem els indicadors
            }
        }

        // Executem la funció al carregar la pàgina
        checkScreenSize();

        // Executem la funció quan es redimensiona la finestra
        $(window).resize(function() {
            checkScreenSize();
        });
    });
</script>
</body>
</html>
