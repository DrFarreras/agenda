<?php
require_once __DIR__ . '/../config/db.php'; // Adjust the path as necessary

$config = require __DIR__ . '/../config/db.php';

try {
    $db = new PDO(
        "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
        $config['user'],
        $config['pass']
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

$id_esdev = $_GET['id'] ?? null;

if ($id_esdev) {
    try {
        $stmt = $db->prepare("SELECT * FROM ESDEVENIMENTS WHERE id_esdev = ?");
        $stmt->execute([$id_esdev]);
        $evento = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$evento) {
            echo "Evento no encontrado.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error al obtener el evento: " . $e->getMessage();
        exit;
    }
} else {
    echo "Evento no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($evento['titol']); ?> - AGENDA FIGUERES</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="navbar-container">
        <a href="main.php" class="navbar-brand">
            <img src="/public/img/2.png" class="navbar-logo" alt="Logo">
        </a>
        <ul class="navbar-links">
            <li><a href="#inicio"><i class="bi bi-search"></i></a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li><a href="perfil.php"><i class="bi bi-person-fill"></i></a></li>
                <li><a href="logout.php" title="Cerrar Sesión"><i class="bi bi-box-arrow-right"></i></a></li>
            <?php else: ?>
                <li><a href="login.php" title="Perfil"><i class="bi bi-person-fill"></i></i></a></li>
                <li><a href="login.php" title="Iniciar Sesión"><i class="bi bi-box-arrow-in-right"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<main>
        <div class="event-container">
            <!-- Left Side - Event Details -->
            <div class="event-content-left">
                <h1 class="event-title"><?php echo htmlspecialchars($evento['titol']); ?></h1>
                
                <div class="event-image-container">
                    <?php if ($evento['url_imatge']): ?>
                        <img src="<?php echo htmlspecialchars($evento['url_imatge']); ?>" 
                             alt="<?php echo htmlspecialchars($evento['titol']); ?>" 
                             class="event-image">
                    <?php else: ?>
                        <div class="event-image-placeholder"></div>
                    <?php endif; ?>
                </div>

                <div class="event-characteristics">
                    <h2 class="characteristics-title">CARACTERÍSTICAS</h2>
                    <div class="event-info">
                        <div class="event-info-item">
                            <i class="bi bi-calendar-event"></i>
                            <span><?php echo date('d/m/Y', strtotime($evento['data'])); ?></span>
                        </div>
                        
                        <div class="event-info-item">
                            <i class="bi bi-clock"></i>
                            <span><?php echo date('H:i', strtotime($evento['hora'])); ?></span>
                        </div>
                        
                        <div class="event-info-item">
                            <i class="bi bi-geo-alt"></i>
                            <span>
                                Lat: <?php echo htmlspecialchars($evento['latitud']); ?><br>
                                Long: <?php echo htmlspecialchars($evento['longitud']); ?>
                            </span>
                        </div>

                        <dºiv class="event-info-item">
                            <i class="bi bi-card-text"></i>
                            <span><?php echo htmlspecialchars($evento['descripcio']); ?></span>
                        </dºiv>
                    </div>
                </div>
            </div>

            <!-- Right Side - Comments -->
            <div class="event-comments">
                <h3 class="comments-title">COMENTARIOS</h3>
                
                <!-- Comment Items -->
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-user-icon"></div>
                        <span class="comment-username">Usuario</span>
                    </div>
                    <p class="comment-text">COMENTARIO</p>
                </div>

                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-user-icon"></div>
                        <span class="comment-username">Usuario</span>
                    </div>
                    <p class="comment-text">COMENTARIO</p>
                </div>

                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-user-icon"></div>
                        <span class="comment-username">Usuario</span>
                    </div>
                    <p class="comment-text">COMENTARIO</p>
                </div>

                <!-- Add Comment Form -->
                <?php if (isset($_SESSION['user_id'])): ?>
                <div class="comment-form">
                    <form action="" method="POST">
                        <textarea name="comment" placeholder="Añade un comentario..." class="comment-input"></textarea>
                        <button type="submit" class="comment-submit">Enviar</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
 <!-- Footer -->
 <footer class="footer bg-light py-3">
    <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5>Navegación</h5>
                    <ul>
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#eventos">Eventos</a></li>
                        <li><a href="/public/aboutus.php/">Sobre Nosotros</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h5>Eventos</h5>
                    <ul>
                        <li><a href="#">Próximos Eventos</a></li>
                        <li><a href="#">Eventos Destacados</a></li>
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Archivo</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h5>Contacto</h5>
                    <ul>
                        <li><a href="#"><i class="bi bi-envelope-open-fill"></i> Email</a></li>
                        <li><a href="#"><i class="bi bi-telephone-fill"></i> +34 972 50 79 08</a></li>
                        <li><a href="#"><i class="bi bi-geo-alt-fill"></i> C/ Pelai Martínez, 1, 17600 Figueres, Girona</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <div class="footer-section">        <div class="social-icons">
                <a href="https://www.instagram.com/inscendrassos/?hl=es"><i class="bi bi-instagram"></i></a>
                <a href="https://es-es.facebook.com/institutcendrassos"><i class="bi bi-facebook"></i></a>
                <a href="https://x.com/cendrassos?lang=es"><i class="bi bi-twitter"></i></a>
                </div>
                
                <div class="footer-bottom">
            <span>© 2024 Agenda Sostenible Figueres</span>
        </div>
            </div>
        </div>  
    </footer>
</body>
</html>