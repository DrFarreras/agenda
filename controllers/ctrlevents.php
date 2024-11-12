<?php
function ctrlevents($request, $response, $container){
    // Obtener conexión a la base de datos
    $db = $container->getDb();
}
    // Consulta para obtener los eventos
    $stmt = $db->query("SELECT id_esdev, titol, descripcio, data, hora, url_imatge FROM ESDEVENIMENTS ORDER BY data ASC");
    $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Pasar los eventos a la vista
    $response->set('eventos', $eventos);
    $response->setTemplate('../../views/main.php'); // Asegúrate de que la ruta sea correcta
    return $response;
?>
