<?php
require_once '../config/db.php';

class Event {
    private $conn;
    private $table = "ESDEVENIMENTS";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getEvents() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createEvent($title, $description, $date, $time, $type) {
        $query = "INSERT INTO {$this->table} (titol, descripcio, data, hora, imatge) 
                     VALUES (:titol, :descripcio, :data, :hora, :imatge)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titol", $title);
        $stmt->bindParam(":descripcio", $description);
        $stmt->bindParam(":data", $date);
        $stmt->bindParam(":hora", $time);
        $stmt->bindParam(":imatge", $type);

        return $stmt->execute();
    }
}
?>
