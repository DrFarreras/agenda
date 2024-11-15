<?php

function ctrlDashboardEventsEdits($request, $response, $container){
    $eventModel = $container->Events();
    $events = $eventModel->getAllEvents(); // Assuming this method exists

    $response->set('events', $events);
    $response->setTemplate('dashboardevents.php');
    return $response;
}