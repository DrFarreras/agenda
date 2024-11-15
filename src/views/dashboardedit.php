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

    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex pt-3">
                <h3>Editar usuario</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?r=adminpaneleditupdate">
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="username" id="username" required value="<?= htmlspecialchars($user['username']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="surname" id="surname" required value="<?= htmlspecialchars($user['surname']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" required value="<?= htmlspecialchars($user['name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" required value="<?= htmlspecialchars($user['email']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="imgProfile" class="form-label">Imágen de Perfil</label>
                        <input type="file" class="form-control" name="imgProfile" id="imgProfile">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select class="form-select" name="role" id="role">
                            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>Usuario</option>
                            <option value="administrator" <?= $user['role'] === 'administrator' ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="Password" id="Password">
                    </div>
                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Repetir Contraseña</label>
                        <input type="password" class="form-control" name="repeatPassword" id="repeatPassword">
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>