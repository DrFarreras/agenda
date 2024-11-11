<?php
require_once '../modules/mevents.php';

class EventController {
    private $event;

    public function __construct($db) {
        $this->event = new Event($db);
    }

    public function showEvents() {
        $result = $this->event->getEvents();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEvent($title, $description, $latitude, $longitude, $date, $time, $type) {
        return $this->event->createEvent($title, $description, $latitude, $longitude, $date, $time, $type);
    }
}
?>
