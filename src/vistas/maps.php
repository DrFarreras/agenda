<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mapa</title>
    <link rel="stylesheet" href="/src/css/style-main.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #mapid {
            height: 70vh;  /* Ajuste de altura del mapa a 90% de la ventana */
            width: 100%;
            margin-top: 5%; /* Sin separación para que esté justo debajo del navbar */
            border-radius: 10px;

        }

        .logo-img {
            width: 40px;  /* Tamaño de logo ajustado */
            height: auto;
        }
        


        /* Media query para dispositivos móviles */
        @media (max-width: 768px) {
            #mapid {
                height: 80vh; /* Ajusta la altura en móviles si es necesario */
                margin-top: 17%;
                border-radius: 10px;
            }
            .navbar-brand span {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body class="bg-light">

<?php include 'C:\Users\farre\Desktop\CLASE\agendafigueres\src\vistas\navbar.php'; ?>


<section id="map" style="padding-top: 56px;"> <!-- Padding para separar del navbar -->
    <div id="mapid"></div>
</section>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicia el mapa Leaflet
        const map = L.map('mapid').setView([42.2674, 2.9556], 13);  // Coordenadas de Barcelona, ajusta según sea necesario
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 80,
        }).addTo(map);

        // Puedes agregar un marcador opcionalmente
        L.marker([42.2674, 2.9556]).addTo(map)
            .bindPopup('Ubicación de eventos')
            .openPopup();
    });
</script>

<!-- footer -->
<?php include 'C:\Users\farre\Desktop\CLASE\agendafigueres\src\vistas\footer.php'; ?>


</body>
</html>
