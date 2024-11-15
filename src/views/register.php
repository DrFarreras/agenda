<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/src/css/style.css">
    <script src="/src/js/main.js"></script>
</head>

<body class="bg-custom-green-lightest ">
    <!-- Register Form -->
    <div class="mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-start mb-2">
                    <i class="bi bi-arrow-left fs-4 back-arrow" onclick="history.back()"></i>
                </div>
                <div class="card shadow">
                    <div class="card-body p-3">
                        <h1 class="text-center text-custom-green mb-4">Crear cuenta</h1>
                        <form action="?r=doregister" id="registrationForm" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-2">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nombre" required>
                                <label for="name">Nombre</label>
                                <div class="invalid-feedback">El campo de nombre es obligatorio.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="surname" type="text" class="form-control" id="lastname" placeholder="Apellidos" required>
                                <label for="lastname">Apellidos</label>
                                <div class="invalid-feedback">Los apellidos son obligatorios.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="username" type="text" class="form-control" id="user" placeholder="Usuario" required>
                                <label for="user">Usuario</label>
                                <div class="invalid-feedback">El nombre de usuario es obligatorio.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="email" type="email" class="form-control" id="email" placeholder="Correo Electrónico" required>
                                <label for="email">Correo Electrónico</label>
                                <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
                            </div>
                            <div class="form-floating mb-2 ">
                                <input name="role" type="role" class="form-control" id="role" hidden value="user">
                                
                            </div>
                            <div class="form-floating mb-2">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" required minlength="8" maxlength="20">
                                <label for="password">Contraseña</label>
                                <div class="invalid-feedback">La contraseña debe tener entre 8 y 20 caracteres.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="RepetirContraseña" required minlength="8" maxlength="20">
                                <label for="password">Repetir Contraseña</label>
                                <div class="invalid-feedback">Las contraseñas no coinciden</div>
                            </div>
                            <button type="submit" class="btn btn-custom-green w-100">Crear cuenta</button>
                        </form>
                        <div class="text-center mt-3">
                            <small>Ya tienes una cuenta? <a href="/index.php?r=login" class="text-custom-green">Inicia sesión</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>