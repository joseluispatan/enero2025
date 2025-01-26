<x-jet-admin::dashboard-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <h1 class="text-xl font-bold">Actualizar vía</h1>
    <style>
        #grid-container {
            display: grid;
            /* Tres columnas de igual tamaño */
            gap: 20px;
            /* Espacio entre los elementos del grid */
            margin: 20px;
            /* Margen alrededor del contenedor */
            border: 2px solid #faf9f9;
        }
    </style>
    <form id="myForm" action="{{ route('admin.vias.update', $via) }}" method="POST"
        class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-lg">

        @csrf
        @method('PUT')

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- PRIMERA FILA -->
        <div id="grid-container" class="grid grid-cols-3 gap-4">
            <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    NOMBRE DE LA VÍA:
                </x-label>
                <x-input name="nombre"
                    class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba el nombre de la vía" value="{{ old('nombre', $via->nombre) }}" required />
            </div>
            <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    ANCHO DE LA VÍA:
                </x-label>
                <x-input name="ancho"
                    class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                    placeholder="Escriba el ancho de la vía" value="{{ old('ancho', $via->ancho) }}" required />
            </div>
            <div class="flex flex-col p-2 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    REVESTIMIENTO DE LA VÍA:
                </x-label>
                <select
                    class="mt-1 block w-full h-8 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-md focus:ring focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500"
                    name="revestimiento_id" id="revestimiento_id">
                    @foreach ($revestimientos->pluck('revestimiento', 'id')->unique() as $id => $nombre)
                        <option @selected(old('revestimiento_id', $via->revestimiento_id) == $id) value="{{ $id }}">
                            {{ $nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('admin.vias.index') }}"
                    class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none flex items-center h-10"
                    aria-label="Retornar a la lista de personas">
                    <i class="fas fa-arrow-left"></i> Retornar
                </a>
                <div class="flex-1 text-center flex justify-center space-x-2">
                    <button type="submit"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 flex items-center h-10">
                        <i class="fas fa-sync"></i>
                        <span class="ml-2">Actualizar</span>
                    </button>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.getElementById('myForm').addEventListener('submit', function(e) {
                        e.preventDefault(); // Prevenir el envío del formulario
                        // Obtener todos los inputs
                        const inputs = this.querySelectorAll('input');
                        let vacios = [];
                        let esValido = true;
                        inputs.forEach(input => {
                            if (input.value.trim() === '') {
                                vacios.push(input);
                                esValido = false;
                            }
                        });
                        if (!esValido) {
                            // Si hay campos vacíos, mostrar un alert
                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: 'Existen campos vacíos. Por favor, llénalos.',
                                confirmButtonText: 'Aceptar'
                            });
                            // Marcar los campos vacíos
                            vacios.forEach(input => {
                                input.classList.add('border-red-500'); // Añadir clase para marcar input
                            });
                        } else {
                            // Preguntar si desea guardar los cambios
                            Swal.fire({
                                title: '¿Está seguro?',
                                text: "¿Desea guardar los cambios?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Sí, guardar',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit(); // Enviar el formulario si el usuario confirma
                                }
                            });
                        }
                    });
                });
            </script>
</x-jet-admin::dashboard-layout>
