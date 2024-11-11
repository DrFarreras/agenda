<?php
session_start();
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../models/imagespdo.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Asegurarnos de que tenemos todos los datos necesarios
$usuario = array_merge([
    'nom' => 'No disponible',
    'cognoms' => 'No disponible',
    'correu_electronic' => 'No disponible',
    'nom_usuari' => 'No disponible',
    'rol' => 'Usuario',
    'data_registre' => 'No disponible',
    'ultima_connexio' => 'No disponible',
    'imatge_perfil' => null
], $_SESSION['usuario']);

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
            <!-- Columna de información personal -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <?php if (!empty($usuario['imatge_perfil'])): ?>
                                <img src="/public/img/<?php echo htmlspecialchars($usuario['imatge_perfil']); ?>" 
                                     alt="Foto de perfil" 
                                     class="rounded-circle" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            <?php else: ?>
                                <img src="/public/img/default-profile.png" 
                                     alt="Foto de perfil por defecto" 
                                     class="rounded-circle" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            <?php endif; ?>
                        </div>
                        
                        <h5 class="mb-2"><?php echo htmlspecialchars($usuario['nom'] . ' ' . $usuario['cognoms']); ?></h5>
                        <p class="text-muted mb-3"><?php echo htmlspecialchars($usuario['rol']); ?></p>
                        
                        <!-- Formulario para actualizar foto -->
                        <form action="update-profile-photo.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="file" class="form-control form-control-sm" name="profilePhoto" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="bi bi-camera"></i> Actualizar Foto
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Columna de detalles -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Información de la Cuenta</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="text-muted">Email</h6>
                                <p class="mb-0"><?php echo htmlspecialchars($usuario['correu_electronic']); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted">Usuario</h6>
                                <p class="mb-0"><?php echo htmlspecialchars($usuario['nom_usuari']); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted">Fecha de Registro</h6>
                                <p class="mb-0"><?php echo htmlspecialchars($usuario['data_registre']); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="text-muted">Última Conexión</h6>
                                <p class="mb-0"><?php echo htmlspecialchars($usuario['ultima_connexio']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="edit-profile.php" class="btn btn-primary">
                                <i class="bi bi-pencil-square"></i> Editar Perfil
                            </a>
                            <a href="change-password.php" class="btn btn-secondary">
                                <i class="bi bi-key"></i> Cambiar Contraseña
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 