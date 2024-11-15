<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/src/js/main.js"></script>
</head>

<body class="bg-custom-green-lightest">
<?php include_once 'navbar.php'; ?>

    <div class="container-lg mt-5" id="profile-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Editar Perfil</h1>
                
                <form action="?r=doprofileupdate" method="POST" enctype="multipart/form-data">
                <div class="text-center mb-3">
                    <?php if (!empty($userData['profile_img'])): ?>
                        <img src="<?= $userData['profile_img'] ?>" alt="Foto de perfil actual" width="150" height="150" class="rounded-circle mb-2">
                    <?php else: ?>
                        <img src="/img/defaultprofile.jpg" alt="" width="80" height="80" class="rounded-circle mb-2">
                    <?php endif; ?>
                    <input type="file" class="form-control mt-2" name="profile_img" accept="image/*">
                </div>
                        <div class="row mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nombre" value="<?php echo htmlspecialchars($userData['name'])?>" required>
                    </div>
                    <div class="row mb-3">
                        <input type="text" class="form-control" name="lastname" placeholder="Apellidos" value="<?= $userData['username']?>" required>
                    </div>
                    <div class="row mb-3">
                        <label for="emailInput" hidden>Email Address:</label>
                        <input type="text" id="emailInput" class="form-control" name="email" value="<?= $userData['email']?>" required>
                    </div>
                    <div class="row mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" minlength="8" maxlength="20">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>