<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>
<body class="bg-custom-green-lightest d-flex align-items-center justify-content-center vh-100">
    <!-- Contenedor centrado para Login Form -->
    <div class="login-container">
        <div class="login-card">
            <div class="text-start mb-3">
                <i class="bi bi-arrow-left fs-4 back-arrow" onclick="history.back()"></i>
            </div>
            <img src="/img/2.png" alt="Logo" class="login-logo">
            <h1 class="login-title">Iniciar Sesión</h1>
            <form id="registrationForm" method="POST" action="/index.php?r=dologin">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="user" name="username" placeholder="Usuario" required>
                    <label for="user">Usuario</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                    <label for="password">Contraseña</label>
                </div>
                <button type="submit" class="btn-login btn-custom-green">Iniciar Sesión</button>

                <p class="mt-3">¿No tienes una cuenta? <a href="/?r=register">Regístrate aquí</a></p>

            </form>
        </div>
    </div>
</body>

</html>
