<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mapa</title>
    <link rel="stylesheet" href="/src/css/style-main.css">

    <!-- Incloem el CSS de Leaflet per a mostrar el mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Estil del mapa */
        #mapid {
            height: 70vh;  /* Ajustem l'altura del mapa al 70% de la finestra */
            width: 100%;   /* El mapa ocupa tota l'amplada de la pàgina */
            margin-top: 5%; /* Petita separació del navbar */
            border-radius: 10px; /* Arrodonim les cantonades del mapa */
        }

        /* Estil per al logo (si n'hi ha) */
        .logo-img {
            width: 40px;  /* Ajustem el tamany del logo */
            height: auto; /* Mantenim la proporció de l'altura */
        }

        /* Media query per adaptar el mapa a pantalles més petites */
        @media (max-width: 768px) {
            #mapid {
                height: 80vh; /* Augmentem l'altura a pantalles petites si és necessari */
                margin-top: 17%; /* Més separació del navbar */
                border-radius: 10px; /* Mantenim les cantonades arrodonides */
            }
            .navbar-brand span {
                font-size: 1rem; /* Reduïm la mida de la font del logo en mòbils */
            }
        }
    </style>
</head>
<body class="bg-light">

<!-- Incloem el navbar de la pàgina -->
<?php include '..\vistas\navbar.php'; ?>

<section id="map" style="padding-top: 56px;"> <!-- Afegim un padding per separar del navbar -->
    <div id="mapid"></div> <!-- On es renderitzarà el mapa -->
</section>

<!-- Incloem el JS de Leaflet per carregar i gestionar el mapa -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Inicialitzem el mapa amb les coordenades de Figueres
        const map = L.map('mapid').setView([42.2674, 2.9556], 13);  // Coordenades de Figueres (ajusta segons sigui necessari)
        
        // Afegim la capa del mapa amb OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 80,  // Màxim nivell de zoom
        }).addTo(map);

        // Afegim un marcador a les coordenades especificades
        L.marker([42.2674, 2.9556]).addTo(map)
            .bindPopup('Ubicació de l\'esdeveniment')  // Text que apareix quan fem clic al marcador
            .openPopup();  // Obrim el popup per defecte
    });
</script>

<!-- Incloem el peu de pàgina -->
<?php include '..\vistas\footer.php'; ?>

</body>
</html>
