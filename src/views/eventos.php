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

<?php include 'navbar.php'; ?>


    <!-- Main Content -->
    <div class="container-lg py-4 container-events">
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
                                    <button class="btn btn-sm btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" hidden>
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                        <!-- Opción Editar -->
                                        <li><a class="dropdown-item" href="index.php?r=editarevento&id=<?php echo $event['event_id']; ?>">Editar</a></li>
                                        <!-- Opción Eliminar -->
                                        <li><a class="dropdown-item" href="index.php?r=eliminarevento&id=<?php echo $event['event_id']; ?>">Eliminar</a></li>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex gap-3 mb-3">
                                <div class="date-box bg-light rounded d-flex flex-column align-items-center justify-content-center">
                
                                    </span>
                                    
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="card-title"><?php echo htmlspecialchars($event['event_title'] ?? 'Título no disponible'); ?></h5>
                                    <p class="card-text text-muted small"><?php echo htmlspecialchars($event['event_description'] ?? 'Sin descripción'); ?></p>
                                    <div class="d-flex gap-3 text-muted small">
                                    <span class=" flex-grow-1 d-flex gap-3 text-muted small">
                                    <?php
                                        // Display the full date in a readable format
                                        $date = isset($event['date_start']) ? strtotime($event['date_start']) : null;
                                        echo $date ? date('d M Y', $date) : 'Sin fecha';
                                        ?>
                                    </span>
                                        <div>
                                            <i class="bi bi-clock me-1"></i>
                                            <span><?php echo htmlspecialchars($event['event_time'] ?? 'Sin hora'); ?></span>
                                        </div>
                                        <div>
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span><?php echo htmlspecialchars($event['event_location'] ?? 'Sin ubicación'); ?></span>
                                        </div>
                                        <div> 
                                        <i class="bi bi-filter"></i>
                                        <span><?php echo htmlspecialchars($event['filter'] ?? 'Sin tipo de evento'); ?></span>
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


   
<!-- Includes the Leaflet JS to load and manage the map -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/map.js"></script>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>