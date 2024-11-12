<?php

function ctrlprofile($request, $response, $container){
    $userData = $_SESSION['user'];

    $response->set('userData', $userData);

    $response->setTemplate('perfil.php');

    return $response;
} 