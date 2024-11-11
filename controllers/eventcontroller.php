<?php

function eventcontroller($request, $response, $container){
    $response->setTemplate('events.php');
    return $response;
}