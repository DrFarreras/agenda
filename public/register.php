<?php
session_start();
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../models/imagespdo.php';

// Si el usuario ya está autenticado, redirigir a main.php
if (isset($_SESSION['usuario'])) {
    header('Location: main.php');
    exit();
}

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $errors = [];

    // Validaciones
    if (empty($nombre)) $errors[] = "El nombre es requerido";
    if (empty($apellidos)) $errors[] = "Los apellidos son requeridos";
    if (empty($email)) $errors[] = "El email es requerido";
    if (empty($username)) $errors[] = "El nombre de usuario es requerido";
    if (empty($password)) $errors[] = "La contraseña es requerida";
    if ($password !== $confirm_password) $errors[] = "Las contraseñas no coinciden";

    if (empty($errors)) {
        try {
            $config = require __DIR__ . '/../config/db.php';
            $usuarisPDO = new \Daw\UsuarisPDO($config);
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $result = $usuarisPDO->add($nombre, $apellidos, $email, $username, $hashed_password);
            
            if (isset($result['error'])) {
                $_SESSION['error'] = $result['error'];
            } else {
                $_SESSION['success'] = "Registro completado con éxito. Por favor, inicia sesión.";
                header('Location: login.php');
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al procesar el registro: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - AGENDA FIGUERES</title>
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

            <div class="login-header">
                <img src="/public/img/2.png" alt="Logo" class="login-logo">
                <h2>Crear Cuenta</h2>
            </div>
            
            <form action="" method="POST" class="login-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar Contraseña" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </div>

                <div class="login-footer">
                    <p>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 
        <!-- Añade esto justo después de <div class="register-box"> -->
<?php if (isset($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php 
            foreach ($_SESSION['errors'] as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            unset($_SESSION['errors']);
            ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php 
        echo htmlspecialchars($_SESSION['error']);
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>
    </div>
</body>
</html> 