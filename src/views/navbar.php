<nav class="navbar navbar-expand-lg">
    <div class="container-lg">
        <a class="navbar-brand" href="index.php">
            <img src="/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-links" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?r=search"><i class="bi bi-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?r=map"><i class="bi bi-geo-alt"></i></a>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (!empty($_SESSION['user']['profile_img'])): ?>
                                <img src="<?= $_SESSION['user']['profile_img'] ?>" alt="Foto de perfil" width="32" height="32" class="rounded-circle">
                            <?php else: ?>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if ($_SESSION['user']['role'] === 'administrator'): ?>
                                <li><a class="dropdown-item" href="index.php?r=dashboard">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="index.php?r=profile">Perfil</a></li>
                            <li><a class="dropdown-item" href="index.php?r=dologout">Cerrar sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/?r=login"><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>