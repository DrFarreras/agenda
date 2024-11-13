<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login</title>
	<!-- Link to the Bootstrap stylesheet -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<!-- Beginning of the body of the page -->
<body style="background-color: rgb(159, 227, 159);">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<!-- Logo section at the top -->
					<div class="text-center my-5">
						<img src="/src/img/2.png" alt="logo" width="100">
					</div>

					<!-- Login card -->
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<!-- Page title -->
							<h1 class="fs-4 card-title fw-bold mb-4">Iniciar Sessió</h1>
							<!-- Login form -->
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adreça email</label>
									<!-- Field for the email address -->
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										El email no és vàlid <!-- Error message if the email is not valid -->
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<!-- Link for password recovery -->
										<a href="#" class="float-end">
											Has oblidat la contrasenya?
										</a>
									</div>
									<!-- Field for the password -->
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Es necessita una contrasenya <!-- Error message if the password is not provided -->
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<!-- Checkbox to remember the user -->
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Recordar-me</label>
									</div>
									<!-- Button to submit the form -->
									<button type="submit" class="btn btn-primary ms-auto">
										Iniciar Sessió
									</button>
								</div>
							</form>
							
						</div>
						<!-- Footer of the card with link to register -->

						
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								No tens un compte? <a href="register.php" class="text-dark">Crea'n una</a>
							</div>
						</div>

					</div>
					<!-- Copyright text at the bottom -->
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2024 &mdash; Agenda Figueres &copy;
					</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>
