<?php
session_start();
require_once __DIR__ . '/../middleware/auth.php';
require_once __DIR__ . '/../models/imagespdo.php';

// Procesar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor, complete todos los campos.";
    } else {
        try {
            $config = require __DIR__ . '/../config/db.php';
            $usuarisPDO = new \Daw\UsuarisPDO($config);
            
            $usuario = $usuarisPDO->login($email, $password);
            
            if ($usuario) {
                // Guardar en sesión
                $_SESSION['usuario'] = $usuario;
                
                header('Location: main.php');
                exit();
            } else {
                $_SESSION['error'] = "Credenciales incorrectas.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al iniciar sesión: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AGENDA FIGUERES</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-box">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                    echo htmlspecialchars($_SESSION['error']);
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                    echo htmlspecialchars($_SESSION['success']);
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="login-header">
                <img src="/public/img/2.png" alt="Logo" class="login-logo">
                <h2>Iniciar Sesión</h2>
            </div>
            
            <form action="" method="POST" class="login-form">
                <div class="form-group mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </div>
                
                <div class="login-footer">
                    <p class="mb-2">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
                    <a href="forgot-password.php" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>