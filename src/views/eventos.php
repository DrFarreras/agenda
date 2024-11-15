<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - Figueres Sostenible</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
</head>

<body class="bg-custom-green-light">

<nav class="navbar">
    <div class="navbar-container">
        <a href="/index.php" class="navbar-brand">
            <img src="/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <ul class="navbar-links">
        <div class="input-group w-50">
    <input type="text" class="form-control" id="search" placeholder="Buscar eventos, consejos, anuncios..." />
    <button class="btn btn-outline-secondary text-gray-600" id="search-button">
        <i class="fas fa-search"></i>
    </button>
</div>

<!-- Error message container -->
<div id="search-error" class="text-danger mt-2"></div>

<!-- Results container -->
<div id="search-results"></div>
            <?php if (isset($_SESSION['user'])): ?>
                <!-- Menú de usuario logueado -->
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if (!empty($_SESSION['user']['profile_img'])): ?>
                            <img src="<?= $_SESSION['user']['profile_img'] ?>" alt="Foto de perfil" width="32" height="32" class="rounded-circle">
                        <?php else: ?>
                           
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


    <!-- Main Content -->
    <div class="container py-4 container-events">
        <div class="bg-custom-green-light">
            <!-- Hero Section -->
            <div class="mb-4 ms-auto">
                <div>
                    <h1 class="fs-2 fw-bold">Eventos</h1>
                    <p class="text-muted">Descubre todas las actividades y eventos sostenibles en Figueres</p>
                </div>
            </div>
         
            <div class="mb-4 d-flex justify-content-start align-items-start">
            <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle filter-events" type="button" id="filterbutton    " data-bs-toggle="dropdown" aria-expanded="false">
                        Filtrar Eventos
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterbutton">
                        <li><button class="dropdown-item" data-filter="Cultural">Cultural</button></li>
                        <li><button class="dropdown-item" data-filter="Historia">Historia</button></li>
                    </ul>
                </div>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator'): ?>
                 <div class="mb-4 ms-auto">
                <a href="index.php?r=crearevento" class="btn btn-create-event"><i class="bi bi-plus-lg "></i> </a>
                 </div>
                <?php endif; ?>
            </div>
            
        <!-- Events List -->
        <div class="events-list mb-4 d-flex flex-wrap justify-content-center">
            <!-- Verifica si existen eventos -->
            <?php if (is_array($events) || is_object($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="card mb-3"> 
                        <div class="card-body">
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator'): ?>
                                <!-- Posicionamiento del dropdown en la esquina superior derecha -->
                                <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                                    <button class="btn btn-sm btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <!-- Opción Editar -->
                                        <li><a class="dropdown-item" href="index.php?r=editarevento&id=<?php echo $event['event_id']; ?>">Editar</a></li>
                                        <!-- Opción Eliminar -->
                                        <li><a class="dropdown-item" href="index.php?r=eliminarevento&id=<?php echo $event['event_id']; ?>">Eliminar</a></li>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex gap-3 mb-3">
                                <div class="date-box bg-light rounded d-flex flex-column align-items-center justify-content-center">
                                    <span class=" flex-grow-1 d-flex gap-3 text-muted small">
                                    <?php
                                        // Display the full date in a readable format
                                        $date = isset($event['date_start']) ? strtotime($event['date_start']) : null;
                                        echo $date ? date('d M Y', $date) : 'Sin fecha';
                                        ?>
                                    </span>
                                    </span>
                                    
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title"><?php echo htmlspecialchars($event['event_title'] ?? 'Título no disponible'); ?></h5>
                                    <p class="card-text text-muted small"><?php echo htmlspecialchars($event['event_description'] ?? 'Sin descripción'); ?></p>
                                    <div class="d-flex gap-3 text-muted small">
                                        <div>
                                            <i class="bi bi-clock me-1"></i>
                                            <span><?php echo htmlspecialchars($event['event_time'] ?? 'Sin hora'); ?></span>
                                        </div>
                                        <div>
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span><?php echo htmlspecialchars($event['event_location'] ?? 'Sin ubicación'); ?></span>
                                        </div>
                                        <div>
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span><?php echo htmlspecialchars($event['event_filter'] ?? 'Sin categoría'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php?r=evento&id=<?php echo $event['event_id']; ?>" class="btn btn-custom-green">Más información</a>                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron eventos.</p>
            <?php endif; ?>
        </div>
    </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>