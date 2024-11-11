<?php
session_start(); // Inicia la sesión si no está iniciada
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión actual
header('Location: login.php'); // Redirige al usuario a la página de inicio de sesión
exit(); // Asegura que el script se detenga después de la redirección
?> 