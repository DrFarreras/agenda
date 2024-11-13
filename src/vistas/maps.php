<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mapa</title>
    <link rel="stylesheet" href="/src/css/style-main.css">

    <!-- Includes the CSS for Leaflet to display the map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Map styling */
        #mapid {
            height: 70vh;  /* Adjust the map height to 70% of the window */
            width: 100%;   /* The map occupies the full width of the page */
            margin-top: 5%; /* Small margin from the navbar */
            border-radius: 10px; /* Round the corners of the map */
        }

        /* Styling for the logo (if present) */
        .logo-img {
            width: 40px;  /* Adjust the logo size */
            height: auto; /* Maintain the height-to-width ratio */
        }

        /* Media query to adapt the map to smaller screens */
        @media (max-width: 768px) {
            #mapid {
                height: 80vh; /* Increase the height on smaller screens if needed */
                margin-top: 17%; /* More space from the navbar */
                border-radius: 10px; /* Keep the rounded corners */
            }
            .navbar-brand span {
                font-size: 1rem; /* Reduce the font size of the logo on mobile devices */
            }
        }
    </style>
</head>
<body class="bg-light">

<!-- Includes the navbar for the page -->
<?php include '..\vistas\navbar.php'; ?>

<section id="map" style="padding-top: 56px;"> <!-- Adds padding to separate from the navbar -->
    <div id="mapid"></div> <!-- Where the map will be rendered -->
</section>

<!-- Includes the Leaflet JS to load and manage the map -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the map with the coordinates of Figueres
        const map = L.map('mapid').setView([42.2674, 2.9556], 13);  // Coordinates for Figueres (adjust as necessary)
        
        // Add the OpenStreetMap tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 80,  // Maximum zoom level
        }).addTo(map);

        // Add a marker at the specified coordinates
        L.marker([42.2674, 2.9556]).addTo(map)
            .bindPopup('Ubicació del esdeveniment')  // Text that appears when clicking the marker
            .openPopup();  // Open the popup by default
    });
</script>

<!-- Includes the footer -->
<?php include '..\vistas\footer.php'; ?>

</body>
</html>
