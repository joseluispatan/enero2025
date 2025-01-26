<x-jet-admin::dashboard-layout>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 93vh;
            /* Ocupa toda la altura de la ventana */
        }
    </style>
    <!-- Para la libreria leaflet-->

    <link rel="stylesheet" href="{{ asset('leaflet/css/leaflet.css') }}">
    <script src="{{ asset('leaflet/js/leaflet.js') }}"></script>

    <!-- Para habilitar mapas base de googlemaps -->
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
    <!-- Para mostrar la ubicacion del mouse-->
    <link rel="stylesheet" href="{{ asset('leaflet/css/L.Control.MousePosition.css') }}" />
    <script src="{{ asset('leaflet/js/L.Control.MousePosition.js') }}" type="text/javascript"></script>
    <!-- Para el control de escala-->
    <link rel="stylesheet" href="{{ asset('leaflet/css/L.Control.BetterScale.css') }}" />
    <script src="{{ asset('leaflet/js/L.Control.BetterScale.js') }}"></script>
    <!-- Para Buscar -->
    <link rel="stylesheet" href="{{ asset('leaflet/css/leaflet-search.css') }}" />
    <script src="{{ asset('leaflet/js/leaflet-search.js') }}"></script>
    <!-- Para habilitar mapas base de googlemaps -->
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>

    <div id="map"></div>
    <script>
        //llamamos al archivo predios.php
        var predios = @include('admin.predios.prediosos');
        var edificios = @json($featureCollection);
        
        //Centramos el Mapa
        var map = L.map('map', {
            zoomControl: false // Desactivar los botones de zoom    
             }).setView([-15.8378, -67.5439], 18);

        var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            minZoom: 2,
            maxZoom: 21
        }).addTo(map);
        var satMutant = L.gridLayer.googleMutant({
            maxZoom: 21,
            minZoom: 6,
            type: "satellite",
        });
        var hybridMutant = L.gridLayer.googleMutant({
            maxZoom: 21,
            minZoom: 6,
            type: "hybrid",
        });
        //Dibujamos los predios

        var predioStyle = {
            'color': "#07b5fb",
            'weight': 2,
            'opacity': 0.9
        };
        //Dibujamos los predios
        var prediosgeoJsonLayer = L.geoJSON(predios, {
            style: edificacionStyle,
            onEachFeature: function(feature, layer) {}
        }).addTo(map);
        //Dibujamos los marcadores geoJson



        var edificacionStyle = {
            'color': "#FF0000",
            'weight': 2,
            'opacity': 0.6
        };
        //Dibujamos la capa edificaciones
        var geoJsonLayer = L.geoJSON(edificios, {
            style: edificacionStyle,
            onEachFeature: function(feature, layer) {
                layer.bindPopup(
                    "<center><strong>Código Catastral: " + feature.properties.codigo +
                    "</strong></center>" +
                    "<li>Bloque:" + feature.properties.bloque + "</li>" +
                    "<li>Piso:" + feature.properties.piso + "</li>" +
                    " <center> <div class='button-container'>" +
                    "<button style=' margin: 0 auto; color: white; background-color: #000080; padding: 5px 20px; border: none; border-radius: 5px; cursor: pointer;' onclick='redirectToEdit(" +
                    feature.properties.id + ")'>Editar</button>" +
                    "     " +
                    "</div>"

                );
            }
        }).addTo(map);

        function redirectToEdit(id) {

        window.location.href = "{{ route('admin.edificacions.edit', ':id') }}".replace(':id', id);

        }

        // Insertando un control de busqueda
        var searchControl = new L.Control.Search({
            layer: geoJsonLayer,
            propertyName: 'codigo',
            marker: false,
            textCancel: 'Cancelar',
            textErr: 'Objeto no encontrado',
            textPlaceholder: 'Buscar',
            moveToLocation: function(latlng, title, map) {
                //map.fitBounds( latlng.layer.getBounds() );
                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                map.setView(latlng, zoom); // access the zoom
            }
        });
        searchControl.on('search:locationfound', function(e) {
            e.layer.setStyle({
                fillColor: '#3f0',
                color: '#0f0'
            });
            if (e.layer._popup)
                e.layer.openPopup();
        }).on('search:collapsed', function(e) {
            featuresLayer.eachLayer(function(layer) { //restore feature color
                featuresLayer.resetStyle(layer);
            });
        });
        map.addControl(searchControl);

        L.control.mousePosition().addTo(map);
        L.control.betterscale().addTo(map);
        //Control de mapas base
        L.control
            .layers({
                Callejero: osm,
                Satelital: satMutant,
                Híbrido: hybridMutant,
            }, ).addTo(map);
    </script>
    </div>
    </div>

</x-jet-admin::dashboard-layout>