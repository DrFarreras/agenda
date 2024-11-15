<?php

function ctrlEditEvent($request, $response, $container){
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $event_id = $_GET['id'];

        $eventModel = $container->Events();
        $event = $eventModel->getEventById($event_id);

        $response->set('event', $event);
        $response->setTemplate('editevents.php');
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $event_id = $request->get(INPUT_POST, "event_id");
        $event_title = $request->get(INPUT_POST, "event_title");
        $event_description = $request->get(INPUT_POST, "event_description");
        $event_location = $request->get(INPUT_POST, "event_location");
        $event_type = $request->get(INPUT_POST, "event_type");
        $event_comment = $request->get(INPUT_POST, "event_comment");
        $date_start = $request->get(INPUT_POST, "date_start");
        $date_end = $request->get(INPUT_POST, "date_end");
        $event_time = $request->get(INPUT_POST, "event_time");
        $filter = $request->get(INPUT_POST, "filter");

        $eventModel = $container->Events();
        $eventModel->updateEvent($event_id, $event_title, $event_description, $event_location, $event_type, $event_comment, $date_start, $date_end, $event_time, $filter);

        $response->redirect("Location: index.php?r=eventos");
    }

    return $response;
}