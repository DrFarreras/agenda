<?php
require_once __DIR__ . '/../../includes/auth.php';
checkAuth();

if (!isAdmin()) {
    header("Location: ../main.php");
    exit();
}

$config = require_once __DIR__ . '/../../config/db.php';
$usuarisPDO = new Daw\UsuarisPDO($config);

// Manejar actualización de rol
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_role'])) {
    $userId = $_POST['user_id'];
    $newRole = $_POST['new_role'];
    
    $result = $usuarisPDO->updateUserRole($userId, $newRole);
    if (isset($result['success'])) {
        $mensaje = "Rol actualizado correctamente";
    } else {
        $error = $result['error'];
    }
}

// Obtener lista de usuarios
$usuarios = $usuarisPDO->getAllUsers();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Gestión de Usuarios</h2>
        
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-success"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['nom']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['cognoms']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['correu_electronic']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="user_id" value="<?php echo $usuario['id']; ?>">
                            <select name="new_role" class="form-select form-select-sm d-inline w-auto">
                                <option value="usuario" <?php echo $usuario['rol'] === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                <option value="admin" <?php echo $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                            </select>
                            <button type="submit" name="update_role" class="btn btn-primary btn-sm">Actualizar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html> 