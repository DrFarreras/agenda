<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>


<body style="background-color: rgb(159, 227, 159);">
    <section class="h-100">
        <div class="container-footer h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Registre</h1>
                            <!-- Registration form -->
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Nom</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Es necessita un nom	
                                    </div>
                                </div>

                                <!-- Surname -->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Cognom</label>
                                    <input id="name" type="text" class="form-control" name="surname" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Es necessita un cognom	
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Nom d'usuari</label>
                                    <input id="name" type="text" class="form-control" name="user" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Es necessita un usuari	
                                    </div>
                                </div>

                                <!-- Email address -->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Adreça de mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                    <div class="invalid-feedback">
                                        El mail és invalid
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Contrasenya</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Es necessita contrasenya
                                    </div>
                                </div>

                                <!-- Terms and conditions -->
                                <p class="form-text text-muted mb-3">
                                    Al registrar-te, acceptes els nostres termes i condicions.
                                </p>

                                <!-- Button to register -->
                                <div class="align-items-center d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Registrar	
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Ja tens un compte? <a href="/src/vistas/login.php" class="text-dark">Inicia Sessió</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2024 &mdash; Agenda Figueres &copy;
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script for login validation and functionality -->
    <script src="../js/login.js"></script>
</body>

</html>
