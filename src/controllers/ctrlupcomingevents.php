<?php
require_once '../models/Events.php'; // Adjust the path as needed

class EventController {
    private $eventModel;

    public function __construct($container) {
        $this->eventModel = $container->Events();
    }

    public function showEventsBetweenDates($startDate, $endDate) {
        return $this->eventModel->getEventsBetweenDates($startDate, $endDate);
    }
}
?>