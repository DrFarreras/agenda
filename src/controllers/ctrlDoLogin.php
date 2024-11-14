<?php

function ctrlDoLogin($request, $response, $container) {
    $username = $request->get(INPUT_POST, 'username');
    $password = $request->get(INPUT_POST, 'password');

    $userModel = $container->Users();
    $user = $userModel->getUserLogin($username, $password);

    if ($user) {
        // Establece los datos de sesión si la autenticación es exitosa
        $response->setSession('user', $user);
        // Redirige a la página de inicio o al dashboard
        $response->redirect("Location: index.php");
    } else {
        // Si la autenticación falla, muestra la página de login de nuevo
        $response->setTemplate('login.php');
    }

    return $response;
}