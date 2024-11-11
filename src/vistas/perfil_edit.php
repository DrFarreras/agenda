<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Incloem el CSS de Bootstrap per estilitzar la pàgina -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
  <!-- Incloem l'estil personalitzat de la pàgina -->
  <link rel="stylesheet" href="/src/css/style-main.css">

</head>

<body>

    <!-- Incloem la barra de navegació -->
    <?php include '..\vistas\navbar.php'; ?>

  <!-- Secció principal amb un fons de color gris clar i un espai a la part superior -->
  <section style="background-color: #eee; margin-top: 17vh;">
    <div class="container py-5">
      <div class="espai_alt_edit_perfil">
        <!-- Espai per a futurs continguts (potser un formulari d'edició de perfil o alguna altra cosa) -->
      </div>

      <div class="row">
        <!-- Columna per a la part esquerra de la pàgina (informació del perfil) -->
        <div class="col-lg-4">
          <!-- Targeta amb informació de l'usuari -->
          <div class="card mb-4">
            <div class="card-body text-center">
              <!-- Imatge d'avatar de l'usuari -->
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                <!-- Botó per desar els canvis -->
                <button type="button" data-mdb-button-init data-mdb-ripple-init
                  class="btn btn-outline-success ms-1 text-succes hover:text-white" type="submit" value="Submit" form="form_edit">Save</button>
                <!-- Enllaç per cancel·lar, que porta a la pàgina del perfil -->
                <a href="/src/vistas/perfil.php"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger ms-1 close-session-button" class="boton-danger">Cancel</button></a>
              </div>
            </div>
          </div>

          <!-- Targeta amb enllaços socials (per editar-los) -->
          <div class="card mb-3 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  Globe<input class="text-muted mb-0" type="globe" id="globe" name="globe">
                </li>
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

        <!-- Columna per a la part dreta de la pàgina (formulari d'edició del perfil) -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <!-- Formulari per editar el perfil de l'usuari -->
              <div class="row">
                <div class="col-sm-3">
                  <form method="POST" id="form_edit" action="/perfil.php"> 
                    <label for="fname">Full Name</label>
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
                  <label for="telefon">Mobile</label>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="tel" id="tel" name="tel">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <label for="Adress">Adress</label>
                </div>
                <div class="col-sm-9">
                  <input class="text-muted mb-0" type="adress" id="adress" name="adress">
                </div>
              </div>
            </div>
          </div>

          <!-- Una altra targeta (per mostrar l'estat del projecte) -->
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Incloem el peu de pàgina -->
  <?php include '..\vistas\footer.php'; ?>

</body>

</html>
