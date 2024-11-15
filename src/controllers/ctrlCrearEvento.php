<?php

function ctrlCrearEvento($request, $response, $container){
    $response->setTemplate('crearevento.php');
    return $response; 
} 