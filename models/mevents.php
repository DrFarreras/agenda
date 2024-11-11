<?php
require_once '../config/db.php';

class Event {
    private $conn;
    private $table = "events";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getEvents() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createEvent($title, $description, $latitude, $longitude, $date, $time, $type) {
        $query = "INSERT INTO " . $this->table . " (title, description, latitude, longitude, date, time, type) 
                  VALUES (:title, :description, :latitude, :longitude, :date, :time, :type)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":longitude", $longitude);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":time", $time);
        $stmt->bindParam(":type", $type);

        return $stmt->execute();
    }
}
?>
