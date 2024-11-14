<?php

function ctrlFilterEvents($request, $response, $container) {
    $filter = $_GET['filter'] ?? '';

    $eventModel = $container->Events();
    $events = $eventModel->getEventsByFilter($filter);

    foreach ($events as $event) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($event['event_title']) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($event['event_description']) . '</p>';
        echo '</div>';
        echo '</div>';
    }
}