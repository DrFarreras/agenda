<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consejos de Sostenibilidad</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/src/css/style.css" />
</head>

<body>

    <?php include 'navbar.php'; ?>

    <!-- Encabezado -->
    <header class="bg-custom-green-light text-black text-center py-5">
        <h1>Consejos de Sostenibilidad</h1>
        <p class="lead">
            Descubre prácticas sencillas para hacer tu vida más sostenible.
        </p>
    </header>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <!-- Botón "Crear Consejo" solo para administradores -->
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'administrator'): ?>
            <div class="text-end mb-4">
                <a href="index.php?r=crearConsejo" class="btn btn-success">
                    <i class="fas fa-plus"></i> Crear Consejo
                </a>
            </div>
        <?php endif; ?>
        <div class="row">
            <!-- Consejos de Sostenibilidad -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">1. Reduce el uso de plásticos</h5>
                        <p class="card-text flex-grow-1">
                            Lleva tu propia botella, bolsa y envases para evitar el uso de
                            plásticos de un solo uso.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">2. Ahorra agua y energía</h5>
                        <p class="card-text flex-grow-1">
                            Cierra el grifo cuando no lo necesites y apaga las luces para
                            reducir el consumo de energía.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">3. Compra productos locales y de temporada</h5>
                        <p class="card-text flex-grow-1">
                            Elige productos locales y de temporada para reducir el impacto
                            ambiental del transporte de alimentos.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-success">4. Practica la economía circular</h5>
                        <p class="card-text flex-grow-1">
                            Compra, reutiliza y recicla productos para reducir residuos y
                            aprovechar los recursos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>


  <?php include 'footer.php'; ?>

    <!-- Popper.js y Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>