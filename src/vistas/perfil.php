<!DOCTYPE html>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
  <link rel="stylesheet" href="/src/css/style-main.css">

</head>

<body>

    <!-- Inclou el navbar -->
    
    <?php include '..\vistas\navbar.php'; ?>

  <!-- Aquesta es la seccio del navbar -->
  <section style="background-color: #eee;margin-top: 17vh;">
    <div class="container py-5">
      <div class="espai_alt_edit_perfil">
        
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <!-- Imatge de perfil -->
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                <!-- Botons d'editar i tancar sessió -->
                <a href="/src/vistas/perfil_edit.php"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-success ms-1 " class="boton-succes">Editar</button></a>
                <a href="/src/vistas/login.php"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger ms-1 close-session-button" class="boton-danger">Tancar Sessió</button></a>
              </div>
            </div>
          </div>

          <!-- Llista de xarxes socials -->
          <div class="card mb-3 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://mdbootstrap.com</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg text-body"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <p class="mb-0">@mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <!-- Dades personals -->
              <div class="row">
                <div class="col-sm-3">
                 <form method="POST" id="form_edit" action="/perfil.php"> 
                <label for="fname">Full Name</label>
                </div>
                <div class="col-sm-9">
                <p class="text mb-0">John Smith</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text mb-0">johnsmith@ecofigueres.com</p>
                </div>
              </div>
              
              <hr>
              <div class="row">
                <div class="col-sm-3">
                <label for="telefon">Mobile</label>
                </div>
                <div class="col-sm-9">
                <p class="text mb-0">672726473</p>
                   </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                <label for="Adress">Adress</label>
                </div>
                <div class="col-sm-9">
                <p class="text mb-0">Bay Area, San Francisco, CA</p>
                </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Estatus del projecte -->
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assignat</span> Estatus del Projecte
                </p>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>

<!-- Inclou el footer -->
<?php include '..\vistas\footer.php'; ?>  

</body>

</html>
