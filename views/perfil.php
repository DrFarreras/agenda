<?php
session_start();
require_once __DIR__ . '/../middleware/auth.php';
require_once __DIR__ . '/../config/db.php';

checkAuth();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="main.php">
                <img src="/public/img/2.png" alt="Logo" height="40">
            </a>
            <div class="d-flex">
                <a href="main.php" class="btn btn-outline-light me-2">
                    <i class="bi bi-house-door"></i> Inicio
                </a>
                <a href="logout.php" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <?php if (!empty($usuario['imatge_perfil'])): ?>
                                <img src="/public/img/<?php echo htmlspecialchars($usuario['imatge_perfil']); ?>" alt="Foto de perfil">
                            <?php else: ?>
                                <img src="/public/img/default.png" alt="Foto de perfil por defecto">
                            <?php endif; ?>
                        </div>
                        <h5><?php echo htmlspecialchars($usuario['nom_usuari']); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h4>Información de la Cuenta</h4>
                <ul>
                    <li>Email: <?php echo htmlspecialchars($usuario['correu_electronic']); ?></li>
                    <li>Fecha de Registro: <?php echo htmlspecialchars($usuario['data_registre']); ?></li>
                    <li>Última Conexión: <?php echo htmlspecialchars($usuario['ultima_connexio']); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>