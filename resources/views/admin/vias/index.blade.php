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

        .my - label {
            background - color: white;
            border: 1 px solid #333;
            padding: 2px;
            border-radius: 3px;
            font-weight: bold;
        }

        ;
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
        //llamamos el json vias
        var vias = @json($featureCollection);
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

        // Estilo a la capa

        var viaUrbanaStyle = {
            'color': "#333333", // Color más oscuro para vías urbanas
            'weight': 8, // Peso de la línea más grueso
            'opacity': 0.8, // Opacidad ligeramente menor
            'dashArray': '5, 5' // Línea discontinua (opcional)
        };


        // Estilo alternativo si el nombre está vacío
        var viaUrbanaStyleSinNombre = {
            'color': "#ff0000", // Color rojo
            'weight': 8,
            'opacity': 0.8,
            'dashArray': '5, 5'

        };

        // Dibujamos los marcadores geoJson
        var geoJsonLayer = L.geoJSON(vias, {
            style: function(feature) {
                // Verificamos si el campo 'nombre' está vacío
                if (!feature.properties.nombre || feature.properties.nombre.trim() === "") {
                    return viaUrbanaStyleSinNombre; // Retorna el estilo rojo
                }
                return viaUrbanaStyle; // Retorna el estilo normal
            },
            onEachFeature: function(feature, layer) {
                // Añadir el popup
                layer.bindPopup(
                    "<center><strong>Nombre de la vía: " + feature.properties.nombre +
                    "</strong></center>" +
                    "<li>Ancho: " + feature.properties.ancho + "</li>" +
                    "<li>Revestimiento: " + feature.properties.revestimiento_id + "</li>" +
                    "<li>ID: " + feature.properties.id + "</li>" +
                    " <center> <div class='button-container'>" +
                    "<button style=' margin: 0 auto; color: white; background-color: #000080; padding: 5px 20px; border: none; border-radius: 5px; cursor: pointer;' onclick='redirectToEdit(" +
                    feature.properties.id + ")'>Editar</button>" +

                    "    " +

                    "</div>"
                );
                // Añadir la etiqueta sobre la línea
                if (feature.properties.nombre) {
                    layer.bindTooltip(feature.properties.nombre, {
                        permanent: true, // La etiqueta siempre visible
                        direction: 'top', // Dirección de la etiqueta
                        className: 'my-label' // Clase CSS opcional para estilizar la etiqueta
                    });

                }

            }

        }).addTo(map);

        function redirectToEdit(id) {

            window.location.href = "{{ route('admin.vias.edit', ':id') }}".replace(':id', id);

        }
        // Insertando un control de busqueda
        var searchControl = new L.Control.Search({
            layer: geoJsonLayer,
            propertyName: 'nombre',
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

        //Adicionamos controles al mapa
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
</x-jet-admin::dashboard-layout>
