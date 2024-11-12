<?php

function ctrlDoLogin($request, $response, $container) {
    $username = $request->get(INPUT_POST, 'nom_usuari');
    $password = $request->get(INPUT_POST, 'contrasenya');

    $userModel = $container->users();
    $user = $userModel->getUserLogin($username, $password);

    if ($user) {
        // Establece los datos de sesión si la autenticación es exitosa
        $response->setSession('usuario', $user);
        // Redirige a la página de inicio o al dashboard
        $response->redirect("Location: /index.php?r=main");
    } else {
        // Si la autenticación falla, muestra la página de login de nuevo
        $response->setTemplate('../../views/login.php');
    }

    return $response;
}