<?php

function ctrltips($request, $response, $container){
    $response->setTemplate("consejos.php");
    return $response;
}