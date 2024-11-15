<?php
include('../config.php');

$sql = "SELECT * FROM announcements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Títol: " . $row["title"] . "<br>";
        echo "Descripció: " . $row["description"] . "<br>";
        echo "Estat: " . $row["status"] . "<br>";
        echo "Categoria: " . $row["category"] . "<br>";
        echo "Usuari ID: " . $row["user_id"] . "<br><br>";
    }
} else {
    echo "No hi ha anuncis registrats.";
}
?>