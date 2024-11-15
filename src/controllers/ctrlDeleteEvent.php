<?php

function ctrlDeleteEvent($request, $response, $container){
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $event_id = $_GET['id'];

        $eventModel = $container->Events();
        $eventModel->deleteEvent($event_id);
    }

    $response->redirect("Location: index.php?r=eventos");
    return $response;
}