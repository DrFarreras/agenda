<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Panel de Administración</h1>
            <div>
                <a href="main.php" class="btn btn-outline-light me-2">
                    <i class="bi bi-house-door-fill"></i> Inicio
                </a>
                <a href="perfil.php" class="btn btn-outline-light me-2">
                    <i class="bi bi-person-fill"></i> Mi Perfil
                </a>
                <a href="logout.php" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </header>

    <div class="container py-4">
        <div class="row g-4">
            <!-- Primera fila -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-160">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Gestión de Usuarios</h5>
                        <p class="card-text flex-grow-1">Administra los usuarios del sistema, permisos, roles y comentarios.</p>
                        <a href="#" class="btn btn-primary mt-auto">
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
                        <a href="#" class="btn btn-primary mt-auto">
                            <i class="bi bi-calendar-check me-2 background-icon"></i>Gestionar Eventos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-gear-fill me-2"></i>Configuración</h5>
                        <p class="card-text flex-grow-1">Configura los parámetros generales del sistema.</p>
                        <a href="#" class="btn btn-primary mt-auto">
                            <i class="bi bi-wrench me-2"></i>Ir a Configuración
                        </a>
                    </div>
                </div>
            </div>

            <!-- Segunda fila -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-file-earmark-text me-2"></i>Reportes</h5>
                        <p class="card-text flex-grow-1">Genera y visualiza informes detallados del sistema.</p>
                        <a href="#" class="btn btn-primary mt-auto">
                            <i class="bi bi-file-earmark-bar-graph me-2"></i>Ver Reportes
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-graph-up me-2"></i>Estadísticas</h5>
                        <p class="card-text flex-grow-1">Analiza métricas y tendencias del sistema.</p>
                        <a href="#" class="btn btn-primary mt-auto">
                            <i class="bi bi-bar-chart me-2"></i>Ver Estadísticas
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="bi bi-tools me-2"></i>Mantenimiento</h5>
                        <p class="card-text flex-grow-1">Realiza tareas de mantenimiento y optimización.</p>
                        <a href="#" class="btn btn-primary mt-auto">
                            <i class="bi bi-wrench-adjustable me-2"></i>Ir a Mantenimiento
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>