<?php

class Events
{

    private PDO $sql;

    /**
     *
     * @param PDO $sql Database connection object (PDO)
     */
    public function __construct(PDO $sql) 
    {
        $this->sql = $sql;
    }

    public function addEvent($event_title, $event_description, $event_location, $event_type, $event_comment, $date_start, $date_end, $event_time){

        $event_comment_value = ($event_comment === 'on') ? 1 : 0;

        $query = "INSERT INTO events (event_title, event_description, event_location, event_type, event_comment, date_start, date_end, event_time) VALUES (:event_title, :event_description, :event_location, :event_type, :event_comment, :date_start, :date_end, :event_time);";
        $stm = $this->sql->prepare($query);
        //print_r([":event_title" => $event_title, ":event_description" => $event_description, ":event_location" => $event_location, ":event_type" => $event_type, ":event_comment" => $event_comment_value, ":date_start" => $date_start, ":date_end" => $date_end]);
        $stm->execute([":event_title" => $event_title, ":event_description" => $event_description, ":event_location" => $event_location, ":event_type" => $event_type, ":event_comment" => $event_comment_value, ":date_start" => $date_start, ":date_end" => $date_end, ":event_time" => $event_time]);

        $id = $this->sql->lastInsertId();
        return $id;
    }

    public function deleteEvent($event_id){
        $query = "DELETE FROM events WHERE event_id = :event_id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":event_id" => $event_id]);
    
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            die("Error al eliminar: {$err[0]} - {$err[1]}\n{$err[2]}");
        }
    }

    public function getEventsByFilter($filter) {
        $query = "SELECT * FROM events WHERE filter = :filter";
        $stm = $this->sql->prepare($query);
        $stm->execute([":filter" => $filter]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById($id) {
        $query = "SELECT * FROM events WHERE event_id = :id";
        $stm = $this->sql->prepare($query);
        $stm->execute([":id" => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateEvent($event_id, $event_title, $event_description, $event_location, $event_type, $event_comment, $date_start, $date_end, $event_time, $filter) {
        $event_comment_value = ($event_comment === 'on') ? 1 : 0;
    
        $query = "UPDATE events SET event_title = :event_title, event_description = :event_description, event_location = :event_location, event_type = :event_type, event_comment = :event_comment, date_start = :date_start, date_end = :date_end, event_time = :event_time, filter = :filter WHERE event_id = :event_id";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":event_id" => $event_id,
            ":event_title" => $event_title,
            ":event_description" => $event_description,
            ":event_location" => $event_location,
            ":event_type" => $event_type,
            ":event_comment" => $event_comment_value,
            ":date_start" => $date_start,
            ":date_end" => $date_end,
            ":event_time" => $event_time,
            ":filter" => $filter
        ]);
    
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            die("Error al actualizar: {$err[0]} - {$err[1]}\n{$err[2]}");
        }
    }

    public function searchEvents($search){
        $query = "SELECT * FROM events WHERE event_title LIKE :search OR event_description LIKE :search OR event_location LIKE :search";
        $stm = $this->sql->prepare($query);
        $stm->execute([":search" => "%$search%"]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventsBetweenDates($startDate, $endDate) {
        $query = "SELECT * FROM events WHERE date_start BETWEEN :startDate AND :endDate";
        $stm = $this->sql->prepare($query);
        $stm->execute([
            ":startDate" => $startDate,
            ":endDate" => $endDate
        ]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEvents() {
        $query = "SELECT event_id, event_title, event_description, event_location, date_start, event_time, event_type, filter, date_end FROM events ORDER BY date_start DESC";
        $results = [];
        foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
            $results[] = $result;
        } 
        return $results;
    }

}