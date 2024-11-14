<?php

function ctrlConsejos($request, $response, $container){
    $response->setTemplate("consejos.php");
    return $response;
}