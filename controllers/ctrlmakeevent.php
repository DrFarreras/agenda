<?php

function ctrlmakeevent($request, $response, $container){
    $response->setTemplate('crearevento.php');
    return $response; 
} 