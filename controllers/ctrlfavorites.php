<?php

function ctrlfavorites($request, $response, $container){
    $response->setTemplate('/views/favoritos.php');
    return $response;
} 