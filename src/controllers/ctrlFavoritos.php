<?php

function ctrlFavoritos($request, $response, $container){
    $response->setTemplate('favoritos.php');
    return $response;
} 