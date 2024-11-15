document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('mapid').setView([42.2674, 2.9556], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    L.marker([	42.268056, 2.959444]).addTo(map)
        .bindPopup('Museo Salvador Dalí')
        .openPopup();
    L.marker([42.266603, 2.960581]).addTo(map)
        .bindPopup('Museo del Juguete')
        .openPopup();
    L.marker([42.27388889, 2.94638889]).addTo(map)
        .bindPopup('Castillo St Ferran')
        .openPopup();
});


