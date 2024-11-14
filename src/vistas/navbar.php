<!-- navbar.php-->
<!-- Include the CSS for Bootstrap icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

<!-- Navigation bar-->
<nav class="navbar" style="height: 120.8px">
    <div class="navbar-container">
        <!-- Page logo-->
        <a href="#" class="navbar-brand">
            <img src="/src/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <!-- List of navigation links-->
        <ul class="navbar-links">
            <li>
                <!-- Search button and hidden search box-->
                <a href="#inicio" id="searchIcon" alt="search box">
                    <i class="bi bi-search"></i>
                </a>
                <input type="text" id="searchBox" placeholder="Search..." style="display: none;">
            </li>
            <li><a href="perfil.php" alt="profile"><i class="bi bi-person-fill"></i></a></li>
            <li><a href="maps.php" alt="map"><i class="bi bi-geo-alt"></i></a></li>
            <li><a href="main.php" alt="home"><i class="bi bi-house-door-fill"></i></a></li>
            <!-- Button to activate dark mode (moon) -->
            <li><a href="#" id="toggleDarkMode" alt="dark mode"><i class="bi bi-moon-fill"></i></a></li>
            <li><a href="login.php" alt="log out"><i class="bi bi-box-arrow-right"></i></a></li>
        </ul>
    </div>
</nav>

<!-- Load the JavaScript script to manage dark mode -->
<script src="../js/modefosc.js"></script>

<!-- jQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

<!-- Search animation script-->
<script src="../js/animacio-busqueda.js"></script>