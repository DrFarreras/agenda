<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos - Figueres Sostenible</title>
    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-custom-green-light">

   <?php include 'navbar.php'; ?>
    <!-- Main Content -->
    <div class="container-lg py-4">
        <h1 class="fs-3 fw-bold mb-4 text-custom-green">Eventos Favoritos</h1>

        <!-- Favorite Events Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Example Event Card -->
            <div class="col">
                <div class="card shadow-sm">
                    <img src="https://picsum.photos/800/400" class="card-img-top" alt="Imagen del Evento">
                    <div class="card-body">
                        <h5 class="card-title text-custom-green">Prova</h5>
                        <p class="card-text text-muted small">Prova</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>Prova</span>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye"></i> Ver detalles
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repite las tarjetas de eventos favoritos según sea necesario -->
            <div class="col">
                <div class="card shadow-sm">
                    <img src="https://picsum.photos/800/400" class="card-img-top" alt="Imagen del Evento">
                    <div class="card-body">
                        <h5 class="card-title text-custom-green">Charla sobre Energías Renovables</h5>
                        <p class="card-text text-muted small">Descubre las innovaciones en energía solar.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>Biblioteca Municipal</span>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye"></i> Ver detalles
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Añade más eventos favoritos aquí -->
        </div>
    </div>

   <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>