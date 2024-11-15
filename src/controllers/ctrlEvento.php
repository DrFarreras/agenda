<?php

function ctrlEvento($request, $response, $container){
    $event_id = $_GET['id'] ?? null;
    if ($event_id) {
        $eventModel = $container->Events();
        $event = $eventModel->getEventById($event_id);
        $response->set('event', $event);
    }
    $response->setTemplate('evento.php');
    return $response;
}