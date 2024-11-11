<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Aquesta és una plantilla de pàgina de login basada en Bootstrap 5">
	<title>login</title>
	<!-- Enllaç a la fulla d'estils de Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<!-- començament del cos de la pàgina -->
<body style="background-color: rgb(159, 227, 159);">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<!-- Secció de logo a la part superior -->
					<div class="text-center my-5">
						<img src="/src/img/2.png" alt="logo" width="100">
					</div>

					<!-- Card de login -->
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<!-- Títol de la pàgina -->
							<h1 class="fs-4 card-title fw-bold mb-4">Iniciar Sessió</h1>
							<!-- Formulari de login -->
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adreça email</label>
									<!-- Camp per a l'adreça de correu electrònic -->
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										El email no és vàlid <!-- Missatge d'error si el correu no és vàlid -->
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Contrasenya</label>
										<!-- Enllaç per a recuperar la contrasenya -->
										<a href="#" class="float-end">
											Has oblidat la contrasenya?
										</a>
									</div>
									<!-- Camp per a la contrasenya -->
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Es necessita una contrasenya <!-- Missatge d'error si la contrasenya no es proporciona -->
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<!-- Checkbox per recordar l'usuari -->
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Recordar-me</label>
									</div>
									<!-- Botó per a enviar el formulari -->
									<button type="submit" class="btn btn-primary ms-auto">
										Iniciar Sessió
									</button>
								</div>
							</form>
						</div>
						<!-- Peu de la card amb enllaç a registre -->
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								No tens un compte? <a href="register.php" class="text-dark">Crea'n una</a>
							</div>
						</div>
					</div>
					<!-- Text de copyright a la part inferior -->
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2024 &mdash; Agenda Figueres &copy;
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
