<?php

function registercontroller($request, $response, $container){
    $response->setTemplate('register.php');
    return $response;
} 