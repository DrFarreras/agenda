// Map script for Figueres
$(document).ready(function() {
    // Initialize the map with the coordinates of Figueres
    const map = L.map('mapid').setView([42.2674, 2.9556], 13);  // Coordinates of Figueres (adjust as necessary)
    
    // Add the map layer with OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 80,  // Maximum zoom level
    }).addTo(map);

    // Add a marker at the specified coordinates
    L.marker([42.2674, 2.9556]).addTo(map)
        .bindPopup('Ubicació del event')  // Text that appears when clicking on the marker
        .openPopup();  // Open the popup by default
});
