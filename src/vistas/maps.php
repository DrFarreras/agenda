<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Maps</title>
    <link rel="stylesheet" href="/src/css/style-main.css">

    <!-- We include Leaflet's CSS to properly style and display the map on the webpage -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Styling for the map container */
        #mapid {
            height: 70vh;  /* Set the map's height to 70% of the viewport height */
            width: 100%;   /* Make the map take up the full width of the page */
            margin-top: 5%; /* Add a small margin at the top to separate the map from the navbar */
            border-radius: 10px; /* Round the corners of the map container for a smoother appearance */
        }

        /* Styling for the logo image (if a logo is present) */
        .logo-img {
            width: 40px;  /* Set the width of the logo to 40px */
            height: auto; /* Automatically adjust the height to maintain the aspect ratio */
        }

        /* Media query to make the map responsive on smaller screen sizes (e.g., mobile) */
        @media (max-width: 768px) {
            #mapid {
                height: 80vh; /* Increase the map height to 80% of the viewport height on smaller screens */
                margin-top: 17%; /* Increase the margin-top to create more space from the navbar */
                border-radius: 10px; /* Keep the rounded corners for the map container */
            }
            .navbar-brand span {
                font-size: 1rem; /* Reduce the font size of the logo on mobile to make it fit better */
            }
        }
    </style>
</head>
<body class="bg-light">

<!-- We include the navigation bar (navbar) from an external PHP file -->
<?php include '..\vistas\navbar.php'; ?>

<section id="map" style="padding-top: 56px;"> <!-- Add padding to create separation between the map and navbar -->
    <div id="mapid"></div> <!-- This is the div where the Leaflet map will be rendered and displayed -->
</section>

<!-- We include the Leaflet JavaScript library to manage and display the map functionality -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- We include a custom script that sets up and customizes the Figueres map functionality -->
<script src="../js/maps-figueres.js"></script>

<!-- We include the footer from an external PHP file, containing additional page content -->
<?php include '..\vistas\footer.php'; ?>

</body>
</html>
