<?php

function ctrlProfile($request, $response, $container){
    $userData = $_SESSION['user'];

    $response->set('userData', $userData);

    $response->setTemplate('profile.php');

    return $response;
} 