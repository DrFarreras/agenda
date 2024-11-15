<?php
// Incluye el archivo de configuración y el de la clase Db
include_once('../config.php');
include_once('../models/Db.php');

// Crea una instancia de la clase Db y obtiene la conexión
$db = new Db($config); // Pasa el array de configuración al constructor
$conn = $db->get(); // Obtén la conexión con el método get()

// Comprobar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoge los datos del formulario
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $user_id = $_POST['user_id']; // Asegúrate de que este ID sea válido

    // Inserta el anuncio en la base de datos
    try {
        $stmt = $conn->prepare("INSERT INTO announcements (title, description, status, category, user_id) 
                                VALUES (:title, :description, :status, :category, :user_id)");

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':user_id', $user_id);

        $stmt->execute();
        echo "Anuncio creado correctamente!";
    } catch (PDOException $e) {
        echo "Error en la creación del anuncio: " . $e->getMessage();
    }
}
?>

<!-- Formulario HTML para crear un anuncio -->
<form action="create_announcement.php" method="post">
    Título: <input type="text" name="title" required><br>
    Descripción: <textarea name="description"></textarea><br>
    Estado: <input type="text" name="status"><br>
    Categoría: <input type="text" name="category"><br>
    ID de usuario: <input type="text" name="user_id"><br>
    <button type="submit">Crear Anuncio</button>
</form>