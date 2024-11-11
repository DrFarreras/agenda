<!-- navbar.php -->
<!-- Incloem el CSS de les icones de Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

<!-- Creem la barra de navegació -->
<nav class="navbar" style="height: 120.8px"> <!-- Definim l'altura de la navbar -->
  <div class="navbar-container"> <!-- Contenidor per a la barra de navegació -->
      <!-- Enllaç per al logo -->
      <a href="#" class="navbar-brand">
          <img src="/src/img/2.png" class="navbar-logo" alt="Logo"> <!-- Imatge del logo -->
      </a>
      <!-- Llista d'enllaços a les diferents seccions -->
      <ul class="navbar-links">
          <!-- Enllaç per a la cerca, amb icona de lupa -->
          <li><a href="#inicio" alt="cuadre de busqueda"><i class="bi bi-search"></i></a></li>
          <!-- Enllaç per al perfil, amb icona de persona -->
          <li><a href="perfil.php" alt="perfil"><i class="bi bi-person-fill"></i></a></li>
          <!-- Enllaç per al mapa, amb icona de localització -->
          <li><a href="maps.php" alt="mapa"><i class="bi bi-geo-alt"></i></a></li>
          <!-- Enllaç per a la pàgina d'inici, amb icona de casa -->
          <li><a href="main.php" alt="inici"><i class="bi bi-house-door-fill"></i></a></li>
          <!-- Enllaç per activar/desactivar el mode daltònic, amb icona d'ull amb barra -->
          <li><a href="#" alt="mode daltonic"><i class="bi bi-eye-slash"></i></a></li>
          <!-- Enllaç per tancar la sessió, amb icona de fletxa cap a fora -->
          <li><a href="logout.php" alt="tancar sessio"><i class="bi bi-box-arrow-right"></i></a></li>
      </ul>
  </div>
</nav>
