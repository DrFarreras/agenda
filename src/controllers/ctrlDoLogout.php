<?php

function ctrlDoLogout($request, $response, $container){

    // Inicia la sesión si no está ya iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Destruye todos los datos de la sesión
    $response->setSession("user", []);
    session_unset();     // Elimina todas las variables de sesión
    session_destroy();   // Destruye la sesión

    // Redirige a la página de inicio o de login después del logout
    $response->redirect("Location: index.php");
    return $response;
}
