<form action="update_announcement.php" method="POST">
    <label for="announcement_id">ID de l'Anunci:</label>
    <input type="number" name="announcement_id" required>
    
    <label for="title">Títol:</label>
    <input type="text" name="title" required>
    
    <label for="description">Descripció:</label>
    <textarea name="description"></textarea>
    
    <label for="status">Estat:</label>
    <input type="text" name="status">
    
    <label for="category">Categoria:</label>
    <input type="text" name="category">
    
    <label for="user_id">ID d'Usuari:</label>
    <input type="number" name="user_id" required>
    
    <button type="submit">Actualitzar Anunci</button>
</form>
<?php
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_id = $_POST['announcement_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE announcements SET title='$title', description='$description', 
            status='$status', category='$category', user_id='$user_id' WHERE announcement_id=$announcement_id";

    if ($conn->query($sql) === TRUE) {
        echo "Anunci actualitzat amb èxit!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
