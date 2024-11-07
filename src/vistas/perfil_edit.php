<!DOCTYPE html>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
  <link rel="stylesheet" href="/src/css/style.css">

</head>

<body>

 

    <!-- Navbar superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success w-100 navbar-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/src/img/1.png" alt="Bootstrap" class="logo-img me-2">
                <span>Agenda Figuerenca</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/src/vistas/main.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/src/vistas/maps.html">Mapa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="/src/vistas/perfil.php">Perfil</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <!-- Icono de casa alineado a la derecha -->
             
            </div>
          </div>
    </nav>
  <!-- aixo es el nav -->
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="espai_alt_edit_perfil">
        
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Full Stack Developer</p>
              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
              <div class="d-flex justify-content-center mb-2">
                
                <button type="button" data-mdb-button-init data-mdb-ripple-init
                  class="btn btn-outline-success ms-1 text-succes hover:text-white" type="submit" value="Submit" form="form_edit">Save</button>
                  <button type="button" data-mdb-button-init data-mdb-ripple-init
                  class="cancel-button" class="btn btn-outline-danger ms-1 ">
                  <a class="text-danger" href="/src/vistas/perfil.php">
                    Cancel
                </a>
            </button>
                  
              </div>
            </div>
          </div>

    
            
            
            
            


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
              <div class="row">
                <div class="col-sm-3">
                 <form method="POST" id="form_edit" action="/perfil.php"> 
                <label for="fname">Full Name</label>
                </div>
                <div class="col-sm-9">
                <input  class="text-muted mb-0" type="text" id="fname" name="fname">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">example@example.com</p>
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
                <input class="text-muted mb-0" type="email" id="email" name="email">
                </form>
                </div>
              </div>
            </div>
          </div>
            


          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>

              </div>
            </div>
          </div>
        </div>




      </div>
    </div>
    </div>
  </section>
</body>

</html>