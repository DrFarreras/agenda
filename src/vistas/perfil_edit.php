<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Bootstrap CSS to style the page -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit profile</title>
  <!-- Include the custom style for the page -->
  <link rel="stylesheet" href="/src/css/style-main.css">

</head>

<body>

    <!-- Include the navigation bar -->
    <?php include '..\vistas\navbar.php'; ?>

  <!-- Main section with a light gray background and some space at the top -->
  <section style="background-color: #eee; margin-top: 17vh;">
    <div class="container py-5">
      <div class="espai_alt_edit_perfil">
        <!-- Space for future content (maybe a profile edit form or something else) -->
      </div>

      <div class="row">
        <!-- Column for the left side of the page (user information) -->
        <div class="col-lg-4">
          <!-- Card with user information -->
          <div class="card mb-4">
            <div class="card-body text-center">
              <!-- User avatar image -->
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                <!-- Button to save changes -->
                <button type="button" data-mdb-button-init data-mdb-ripple-init
                  class="btn btn-outline-success ms-1 text-succes hover:text-white" type="submit" value="Submit" form="form_edit">Guardar</button>
                <!-- Link to cancel, which leads to the profile page -->
                <a href="/src/vistas/perfil.php"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger ms-1 close-session-button" class="boton-danger">Cancelar</button></a>
              </div>
            </div>
          </div>

          <!-- Card with social links (to edit them) -->
          <div class="card mb-3 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg text-body"></i>
                  Github<input class="text-muted mb-0" type="github" id="github" name="github">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  Twitter<input class="text-muted mb-0" type="twitter" id="twitter" name="twitter">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  Instagram<input class="text-muted mb-0" type="instagram" id="instagram" name="instagram">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  Facebook<input class="text-muted mb-0" type="facebook" id="facebook" name="facebook">
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Column for the right side of the page (profile edit form) -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <!-- Form to edit the user's profile -->
              <div class="row">
                <div class="col-sm-3">
                  <form method="POST" id="form_edit" action="/perfil.php"> 
                    <label for="fname">Nom Complet</label>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="text" id="fname" name="fname">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="email" id="email" name="email">
                </div>
              </div>
              
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="telefon">Telèfon</label>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="tel" id="tel" name="tel">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="Adress">Adreça</label>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="adress" id="adress" name="adress">
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- Include the footer -->
  <?php include '..\vistas\footer.php'; ?>

</body>

</html>
