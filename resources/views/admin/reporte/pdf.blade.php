<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <style>

    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Para habilitar mapas base de googlemaps -->
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

    <style>
        #map {
            width: 1000px;
            height: 800px;
            padding: 1%;
        }
    </style>
</head>

<div id="map"></div>
<script>
    //llamamos al archivo predios.php
    var predios = @include('predio.prediosos');
    var predio = @json($predito);
    var map = L.map('map', {
        zoomControl: false
    });
    var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        minZoom: 2,
        maxZoom: 21
    }).addTo(map);
    var satMutant = new L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
        minZoom: 2,
        maxZoom: 21
    });
    var hybridMutant = new L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        minZoom: 2,
        maxZoom: 21
    });
    // Estilo a la capa
    var predioStyle = {
        'color': "#000000",
        'weight': 1,
        'opacity': 2,
        'fillOpacity': 0 // opacidad del relleno (no aplica en este caso)
    };
    //Dibujamos los marcadores geoJson
    var geoJsonLayer = L.geoJSON(predios, {
        style: predioStyle,
    }).addTo(map);
    
    var predioStyle1 = {
        'color': "#000000", // color del relleno del polígono
        'weight': 4, // grosor de la línea exterior del polígono
        'opacity': 2,
        'fillOpacity': 0.5, // opacidad del relleno del polígono
        'stroke': {
            'color': "#FFFFFF", // color blanco para la línea exterior
            'weight': 10, // grosor de la línea exterior (más gruesa que la línea del polígono)
            'opacity': 100 // opacidad de la línea exterior
        }
    };

    // Supongamos que 'predio' es el resultado obtenido de tu controlador
    var prediosolo = L.geoJSON(predio, {
    style: predioStyle1,
    }).addTo(map);


    // Centramos el mapa en el polígono
    var centrar = prediosolo.getBounds();
    map.setView(centrar.getCenter(), 18);
    //Control de mapas base
    L.control
        .layers({
            Callejero: osm,
            Satelital: satMutant,
            Híbrido: hybridMutant,
        }, ).addTo(map);
</script>
</div>

</html>
