<?php

function ctrlEventList($request, $response, $container){

    $eventModel = $container->Events();

    $events = $eventModel->getAllEvents();
 
    $response->set('events', $events);
    $response->setTemplate('eventos.php');

    return $response;
}