<?php

function profilecontroller($request, $response, $container){
    $userData = $_SESSION['usuario'];

    $response->set('userData', $userData);

    $response->setTemplate('perfil.php');

    return $response;
} 