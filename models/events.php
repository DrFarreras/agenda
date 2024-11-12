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

    public function addEvent($event_title, $event_description, $event_location, $event_type, $event_comment, $date_start, $date_end){

        $event_comment_value = ($event_comment === 'on') ? 1 : 0;

        $query = "INSERT INTO ESDEVENIMENTS (titol, descripcio, lloc, latitud, longitud, filtrar, cercar, data, hora) VALUES (:titol, :descripcio, :lloc, :latitud, :longitud, :filtrar, :cercar, :data, :hora);";
        $stm = $this->sql->prepare($query);
        //print_r([":event_title" => $event_title, ":event_description" => $event_description, ":event_location" => $event_location, ":event_type" => $event_type, ":event_comment" => $event_comment_value, ":date_start" => $date_start, ":date_end" => $date_end]);
        $stm->execute([":titol" => $event_title, ":descripcio" => $event_description, ":lloc" => $event_location, ":latitud" => $event_type, ":longitud" => $event_comment_value, ":filtrar" => $date_start, ":cercar" => $date_end, ":data" => $date_start, ":hora" => $date_end]);

        $id = $this->sql->lastInsertId();
        return $id;
    }

  public function getAllEvents(){
    $query = "SELECT id_esdev, titol, descripcio, lloc, data, hora, url_imatge FROM ESDEVENIMENTS ORDER BY data ASC;";
    $results = [];
    foreach ($this->sql->query($query, PDO::FETCH_ASSOC) as $result) {
        $results[] = $result;
    }
    return $results;
}

}