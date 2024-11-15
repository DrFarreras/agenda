<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Maps</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- Includes the CSS for Leaflet to display the map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="/js/map.js"></script>
</head>
<body class="bg-light">
<!-- Navbar minimalista con logo -->
<?php include 'navbar.php'; ?>


<section id="map" style="padding-top: 56px;">
    <div id="mapid" style="height: 500px; width: 100%; margin-top: 15px; margin-bottom: 15%; z-index: 1;" class="map"></div>
</section>

<!-- Includes the Leaflet JS to load and manage the map -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


 <!-- Footer -->
 <?php include 'footer.php'; ?>
 
</body>
</html>