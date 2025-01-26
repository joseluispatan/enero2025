<x-jet-admin::dashboard-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h1 class="text-xl font-bold">Actualizar predio</h1>

    <form action="{{ route('admin.predios.update', $predio) }}" method="POST"
        class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-lg">

        @csrf
        @method('PUT')

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <style>
            .tab-content {
                display: none;
            }

            .tab-content.active {
                display: block;
            }

            label,
            select {
                font-size: 0.9rem;
                /* Cambia este valor según sea necesario */
            }
        </style>
        <style>
            /* Estilo personalizado para el modo oscuro */
            #selectedPersons {
                border: 1px solid #ccc;
                padding: 10px;
                margin-top: 10px;
            }

            #personaList li {
                display: flex;
                justify-content: space-between;
                margin: 5px 0;
            }

            #grid-container {
                display: grid;
                /* Tres columnas de igual tamaño */
                gap: 20px;
                /* Espacio entre los elementos del grid */
                margin: 20px;
                /* Margen alrededor del contenedor */
                border: 2px solid #faf9f9;
            }

            .item {
                background-color: lightblue;
                /* Color de fondo para los elementos */
                padding: 10px;
                /* Espacio interno dentro de cada elemento */
                border: 5px solid #eb0404;
                /* Borde para visualizar los elementos */
            }
        </style>

        <body class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200">
            <div class="container mx-auto p-2">
                <div class="border-b border-gray-200">
                    <ul class="flex justify-center flex-wrap -mb-px text-sm font-medium text-center">
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg text-blue-600 border-blue-600 group active"
                                data-tab="profile">
                                DATOS TITULAR / RAZÓN SOCIAL
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300 group"
                                data-tab="dashboard">
                                DATOS DEL INMUEBLE
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300 group"
                                data-tab="settings">
                                COLINDANCIAS / FRENTE Y FONDO
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="tab-link inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300 group"
                                data-tab="contacts">
                                SERVICIOS
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <script>
                // JavaScript para manejar el cambio de tabs
                const tabs = document.querySelectorAll('.tab-link');
                tabs.forEach(tab => {
                    tab.addEventListener('click', (e) => {
                        e.preventDefault();
                        // Remover clases activas de todos los tabs
                        tabs.forEach(t => {
                            t.classList.remove('text-blue-600', 'border-blue-600', 'active');
                        });
                        // Agregar clases activas al tab clicado
                        tab.classList.add('text-blue-600', 'border-blue-600', 'active');
                    });
                });
            </script>
        </body>

        <!-- PRIMER TAB -->
        <div id="profile" class="tab-content active">
            <!-- CONTENIDO DEL PRIMER TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">

                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        PERSONALIDAD
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="personalidad_id" id="personalidad_id">
                        @foreach ($personalidads as $personalidad)
                            <option @selected(old('personalidad_id', $predio->personalidad_id) == $personalidad->id) value="{{ $personalidad->id }}">
                                {{ $personalidad->personalidad }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                    <x-label for="personas" class="block text-sm font-medium text-gray-700">SELECCIÓN POR CÉDULA
                        DE IDENTIDAD:</x-label>
                    <select id="personas" name="personas[]" multiple class="mt-1 block w-full h-8"
                        aria-label="Seleccionar múltiples personas">
                        @foreach ($personas as $persona)
                            <option value="{{ $persona->id }}" data-nombre="{{ $persona->nombre }}"
                                data-paterno="{{ $persona->paterno }}" data-materno="{{ $persona->materno }}"
                                @if ($predio->personas->contains($persona)) selected @endif>
                                {{ $persona->ci }}
                            </option>
                        @endforeach
                    </select>
                    <div id="selected-info" class="mt-4"></div>
                </div>
                <div class=" select-container flex flex-col p-4 bg-gray-300 dark:bg-gray-700" id="columna-empresa"
                    style="width: auto;">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300"> EMPRESA </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="empresa_id" id="empresa_id">
                        @foreach ($empresas as $empresa)
                            <option @selected(old('empresa_id', $predio->empresa_id) == $empresa->id) value="{{ $empresa->id }}">
                                {{ $empresa->empresa }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- SEGUNDA FILA PRIMER TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        RAZÓN SOCIAL:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="razonsocial_id" id="razonsocial_id">
                        @foreach ($razonsocials as $razonsocial)
                            <option @selected(old('razonsocial_id', $predio->razonsocial_id) == $razonsocial->id) value="{{ $razonsocial->id }}">
                                {{ $razonsocial->razonsocial }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        TITULARIDAD:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="titularidad" id="titularidad_id">
                        @foreach ($titularidads as $titularidad)
                            <option @selected(old('titularidad_id', $predio->titularidad_id) == $titularidad->id) value="{{ $titularidad->id }}">
                                {{ $titularidad->titularidad }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- SEGUNDA FILA PRIMER TAB -->
            <div id="grid-container" class="grid grid-cols-3 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        DOCUMENTO DE PROPIEDAD:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="docpropiedad_id" id="docpropiedad_id">
                        @foreach ($docpropiedads as $docpropiedad)
                            <option @selected(old('docpropiedad_id', $predio->docpropiedad_id) == $docpropiedad->id) value="{{ $docpropiedad->id }}">
                                {{ $docpropiedad->docpropiedad }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        NÚMERO DE DOCUMENTO:
                    </x-label>
                    <x-input name="numpropiedad"
                        class="mt-1 block w-full h-10 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba el número de documento"
                        value="{{ old('numpropiedad', $predio->numpropiedad) }}" required />
                </div>
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        MODO DE ADQUISISCIÓN:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="adquisicion" id="adquisicion_id">
                        @foreach ($adquisicions as $adquisicion)
                            <option @selected(old('adquisicion_id', $predio->adquisicion_id) == $adquisicion->id) value="{{ $adquisicion->id }}">
                                {{ $adquisicion->adquisicion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- SEGUNDO TAB -->
        <div id="dashboard" class="tab-content" class="tab-content hidden">
            <!-- PRIMERA FILA SEGUNDO TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        NÚMERO DE PREDIO:
                    </x-label>
                    <x-input name="numero"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba el número del predio" value="{{ old('numero', $predio->numero) }}"
                        required />
                </div>
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        NOMBRE DE VÍA:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="via_id" id="via_id">
                        @foreach ($vias as $via)
                            <option @selected(old('via_id', $predio->via_id) == $via->id) value="{{ $via->id }}">
                                {{ $via->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- SEGUNDA FILA SEGUNDO TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        REVESTIMIENTO DE LA VÍA:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="revestimiento_id" id="revestimiento_id">
                        @foreach ($revestimientos as $revestimiento)
                            @if ($revestimiento->zhs_id == $predio->zh_id)
                                <option @selected(old('revestimiento_id', $predio->revestimiento_id) == $revestimiento->id) value="{{ $revestimiento->id }}">
                                    {{ $revestimiento->revestimiento }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        UBICACIÓN DEL PREDIO:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="ubicacion_id" id="ubicacion_id">
                        @foreach ($ubicacions as $ubicacion)
                            <option @selected(old('ubicacion_id', $predio->ubicacion_id) == $ubicacion->id) value="{{ $ubicacion->id }}">
                                {{ $ubicacion->ubicacion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- TERCERA FILA SEGUNDO TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        FORMA:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="forma_id" id="forma_id">
                        @foreach ($formas as $forma)
                            <option @selected(old('forma_id', $predio->forma_id) == $forma->id) value="{{ $forma->id }}">
                                {{ $forma->forma }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        TOPOGRAFÍA:
                    </x-label>
                    <select
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        name="topografico_id" id="topografico_id">
                        @foreach ($topograficos as $topografico)
                            <option @selected(old('topografico_id', $predio->topografico_id) == $topografico->id) value="{{ $topografico->id }}">
                                {{ $topografico->topografico }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- TERCER TAB -->
        <div id="settings" class="tab-content">
            <!-- PRIMERA FILA TERCER TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        ESTE:
                    </x-label>
                    <x-input name="este"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba la colindancia al este" value="{{ old('este', $predio->este) }}"
                        required />
                </div>
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        OESTE:
                    </x-label>
                    <x-input name="oeste"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba la colindancia al oeste" value="{{ old('oeste', $predio->oeste) }}"
                        required />
                </div>
            </div>
            <!-- SEGUNDA FILA SEGUNDO TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        NORTE:
                    </x-label>
                    <x-input name="norte"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba la colindancia al norte" value="{{ old('norte', $predio->norte) }}"
                        required />
                </div>

                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        SUR:
                    </x-label>
                    <x-input name="sur"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba la colindancia al SUR" value="{{ old('sur', $predio->sur) }}"
                        required />
                </div>
            </div>
            <!-- TERCERA FILA SEGUNDO TAB -->
            <div id="grid-container" class="grid grid-cols-2 gap-4">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        FRENTE:
                    </x-label>
                    <x-input id="mensaje" name="frente"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        required placeholder="Escriba el frente del predio"
                        value="{{ old('frente', $predio->frente) }}" />
                </div>

                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800">
                    <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                        FONDO:
                    </x-label>
                    <x-input id="mensaje" name="fondo"
                        class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                        required placeholder="Escriba el fondo del predio"
                        value="{{ old('fondo', $predio->fondo) }}" />
                </div>
            </div>
        </div>


        <!-- CUARTO TAB -->
        <div id="grid-container" class="grid grid-cols-3 gap-4">
            <div class="hidden md:block"></div> <!-- Columna izquierda vacía -->

            <div id="contacts" class="tab-content flex flex-col items-center">
                <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-800 w-full">
                    @foreach ($servicios as $servicio)
                        <div class="p-2 bg-light border form-check form-switch w-full">
                            <input class="form-check-input" id="switch-{{ $servicio->id }}" type="checkbox"
                                name="servicios[]" value="{{ $servicio->id }}"
                                {{ $predio->servicios->contains($servicio->id) ? 'checked' : '' }} role="switch">
                            <label class="form-check-label" for="switch-{{ $servicio->id }}">
                                {{ $servicio->servicio }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    <div class="flex-1 text-center flex justify-center space-x-2">
                        <button type="submit"
                            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 flex items-center h-10">
                            <i class="fas fa-sync"></i>
                            <span class="ml-2">Actualizar</span>
                        </button>
                    </div>
                </div>


            </div>
            <div class="hidden md:block"></div> <!-- Columna derecha vacía -->
        </div>

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.predios.index') }}"
                class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none flex items-center h-10"
                aria-label="Retornar a la lista de empresas">
                <i class="fas fa-arrow-left"></i> <!-- Ícono -->
                <span class="ml-2">Retornar</span>
            </a>
        </div>
        </div>


        <script>
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');
            tabLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Remove active class from all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Remove active class from all tab links
                    tabLinks.forEach(l => l.classList.remove('text-blue-600', 'border-blue-600'));

                    // Add active class to the clicked tab and its corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                    this.classList.add('text-blue-600', 'border-blue-600');
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Inicializar select2
                $('#personas').select2({
                    placeholder: "Selecciona personas",
                    allowClear: true
                });
                // Cargar personas seleccionadas al iniciar
                const selectedIds = @json($predio->personas->pluck('id')); // Obtén los IDs de las personas seleccionadas
                selectedIds.forEach(id => {
                    const option = $(`#personas option[value="${id}"]`);
                    if (option.length) {
                        option.prop('selected', true).trigger('change'); // Selecciona la opción
                        const nombre = option.data('nombre');
                        const paterno = option.data('paterno');
                        const materno = option.data('materno');
                        $('#selected-info').append(`
                        <div class="selected-person" data-id="${id}">
                        <span>CI: ${option.text()} de ${nombre} ${paterno} ${materno}</span>
                        <button class="remove-person bg-red-500 text-white rounded-md p-1 ml-2" title="Eliminar">
                            <i class="fas fa-trash-alt h-0 w-4"></i>
                        </button>
                        </div> `);
                    }
                });

                // Evento para agregar personas seleccionadas
                $('#personas').on('select2:select', function(e) {
                    const data = e.params.data;
                    const nombre = $(data.element).data('nombre');
                    const paterno = $(data.element).data('paterno');
                    const materno = $(data.element).data('materno');

                    // Acceder al texto de la opción seleccionada correctamente
                    const optionText = $(data.element).text();

                    $('#selected-info').append(`
                    <div class="selected-person" data-id="${data.id}">
                    <span>CI: ${optionText} de ${nombre} ${paterno} ${materno}</span>
                    <button class="remove-person bg-red-500 text-white rounded-md p-1 ml-2" title="Eliminar">
                        <i class="fas fa-trash-alt h-0 w-4"></i>
                    </button>
                    </div>  `);

                    $('#clear-selection').removeClass('hidden');
                });

                // Evento para eliminar una persona seleccionada
                $('#selected-info').on('click', '.remove-person', function() {
                    const personId = $(this).parent().data('id');
                    $(this).parent().remove();
                    $('#personas').val($('#personas').val().filter(id => id != personId)).trigger('change');

                    if ($('#selected-info').children().length === 0) {
                        $('#clear-selection').addClass('hidden');
                    }
                });

                // Evento para limpiar la selección
                $('#clear-selection').on('click', function() {
                    $('#selected-info').empty();
                    $('#personas').val([]).trigger('change');
                    $(this).addClass('hidden');
                });
            });
        </script>
        <script>
            // Para seleccionar empresa
            $(document).ready(function() {
                $('#empresa_id').select2({
                    placeholder: 'Selecciona una empresa',
                    allowClear: true
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const personalidadSelect = document.getElementById('personalidad_id');
                const columnaEmpresa = document.getElementById('columna-empresa');
                const gridContainer = document.getElementById('grid-container');

                // Función para manejar el cambio de personalidad
                function handlePersonalidadChange() {
                    const selectedValue = parseInt(personalidadSelect.value);
                    if (selectedValue === 2) {
                        columnaEmpresa.classList.remove('hidden'); // Mostrar tercera columna
                        columnaEmpresa.classList.add('flex'); // Asegurarse de que tenga la clase flex
                        gridContainer.classList.remove('grid-cols-2'); // Asegurarse de que no tenga grid-cols-2
                        gridContainer.classList.add('grid-cols-3'); // Mostrar tres columnas
                    } else if (selectedValue === 1) {
                        columnaEmpresa.classList.add('hidden'); // Ocultar tercera columna
                        columnaEmpresa.classList.remove('flex'); // Asegurarse de que no tenga la clase flex
                        gridContainer.classList.remove('grid-cols-3'); // Asegurarse de que no tenga grid-cols-3
                        gridContainer.classList.add('grid-cols-2'); // Cambiar a dos columnas
                    }
                }

                // Agregar el evento change
                personalidadSelect.addEventListener('change', handlePersonalidadChange);

                // Llamar a la función inicialmente para ajustar el estado
                handlePersonalidadChange();
            });
        </script>
        <script>
            $(document).ready(function() {
                // Inicializar select2
                $('#personas, #empresa_id').select2({
                    placeholder: "Selecciona una opción",
                    allowClear: true
                });

                function adjustSelectWidth() {
                    $('.select2-container').css('width', $('.select-container').width() + 'px');
                }

                // Ajustar el ancho al cargar la página
                adjustSelectWidth();

                // Ajustar el ancho en eventos de cambio de tamaño de la ventana
                $(window).on('resize', function() {
                    adjustSelectWidth();
                });
            });
        </script>

        <style>
            .select-container {
                width: 100%;
                /* Asegúrate de que su contenedor tenga un ancho definido */
            }

            .select2-container {
                width: 100% !important;
                /* Fuerza el ancho del select2 a 100% */
            }
        </style>

</x-jet-admin::dashboard-layout>
