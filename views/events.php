<?php
session_start();


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
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/index.php" class="navbar-brand">
                <img src="/public/img/2.png" class="navbar-logo" alt="Logo">
            </a>
            <ul class="navbar-links">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="/index.php?r=perfil"><i class="bi bi-person-fill"></i></a></li>
                    <li><a href="/index.php?r=logout"><i class="bi bi-box-arrow-right"></i></a></li>
                <?php else: ?>
                    <li><a href="/index.php?r=dologout"><i class="bi bi-box-arrow-in-right"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Eventos</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($eventos)): ?>
            <div class="row">
                <?php foreach ($eventos as $evento): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo htmlspecialchars($evento['url_imatge'] ?? 'default.png'); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo htmlspecialchars($evento['titol']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($evento['titol']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($evento['descripcio']); ?></p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <?php echo htmlspecialchars($evento['data'] . ' ' . $evento['hora']); ?>
                                    </small>
                                </p>
                                <a href="/index.php?r=more_events&id=<?php echo $evento['id_esdev']; ?>" 
                                   class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No hay eventos disponibles.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>