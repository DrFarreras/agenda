<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Anuncio</title>
</head>
<body>
    <h1>Crear Anuncio</h1>

    <!-- Formulario HTML para crear un anuncio -->
    <form action="create_announcement.php" method="post">
    Título: <input type="text" name="title" required><br>
    Descripción: <textarea name="description"></textarea><br>
    Estado: <input type="text" name="status"><br>
    Categoría: <input type="text" name="category"><br>
    ID de usuario: <input type="text" name="user_id"><br>
    <button type="submit">Crear Anuncio</button>
    </form>

</body>
</html>