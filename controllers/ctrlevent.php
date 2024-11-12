<?php

function ctrlevent($request, $response, $container){
    $response->setTemplate('../views/events.php');
    return $response;
}
?>