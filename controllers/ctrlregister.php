<?php

function ctrlregister($request, $response, $container){
    $response->setTemplate('register.php');
    return $response;
} 