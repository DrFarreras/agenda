<?php

function ctrlEventos($request, $response, $container){
    $response->setTemplate('index.php');
    return $response;
}
