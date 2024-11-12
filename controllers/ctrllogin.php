<?php

function ctrllogin($request, $response, $container){
    $response->setTemplate('/views/login.php');
    return $response;
}
