<?php
include('../config.php');

$announcement_id = $_GET['announcement_id']; // L'ID es passa per URL

$sql = "DELETE FROM announcements WHERE announcement_id=$announcement_id";

if ($conn->query($sql) === TRUE) {
    echo "Anunci eliminat amb Ã¨xit!";
} else {
    echo "Error: " . $conn->error;
}
?>