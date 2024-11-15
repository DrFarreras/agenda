<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="bg-custom-green-lightest">

    <?php include 'navbar.php'; ?>

    <div class="container-lg">
        <div class="row g-4">
            <h2 style="text-align: center; margin-top: 14%;">Panel de Administración</h2>
            <!-- Primera fila -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-160">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Gestión de Usuarios</h5>
                        <p class="card-text flex-grow-1">Administra los usuarios del sistema, permisos, roles y comentarios.</p>
                        <a href="index.php?r=dashboardusers" class="btn btn-primary mt-auto">
                            <i class="bi bi-gear-fill me-2 background-icon"></i>Gestionar Usuarios
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-calendar-event me-2"></i>Eventos</h5>
                        <p class="card-text flex-grow-1">Gestiona los eventos, calendarios y programación.</p>
                        <a href="index.php?r=dashboardevents" class="btn btn-primary mt-auto">
                            <i class="bi bi-calendar-check me-2 background-icon"></i>Gestionar Eventos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-gear-fill me-2"></i>Anuncios</h5>
                        <p class="card-text flex-grow-1">Gestiona los anuncios del sistema.</p>
                        <a href="index.php?r=dashboardanuncios" class="btn btn-primary mt-auto">
                            <i class="bi bi-wrench me-2"></i>Gestionar Anuncios
                        </a>
                    </div>
                </div>
            </div>
  
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>