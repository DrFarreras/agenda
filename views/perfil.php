<?php
session_start();
require_once __DIR__ . '/../middleware/auth.php';
// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$userData = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Perfil de Usuario</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <p class="card-text"><strong>Nombre:</strong> <?php echo htmlspecialchars($userData['nom'] ?? 'No disponible'); ?></p>
            <p class="card-text"><strong>Apellidos:</strong> <?php echo htmlspecialchars($userData['cognom'] ?? 'No disponible'); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($userData['correu_electronic'] ?? 'No disponible'); ?></p>
        </div>
    </div>
</div>
</body>
</html>
