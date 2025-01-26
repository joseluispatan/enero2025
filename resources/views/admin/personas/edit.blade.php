<x-jet-admin::dashboard-layout>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>
    <div class="flex flex-col justify-center items-center"> <!-- Ajusta h-screen según sea necesario -->
        <h1
            class="font-serif text-xl font-bold underline underline-offset-4 mb-4 
                   text-gray-800 dark:text-gray-200">
            Editar Persona
        </h1>
    </div>
    <form action="{{ route('admin.personas.update', $persona) }}" method="POST"
        class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-lg">

        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4" />
        <div class="grid grid-cols-2 grid-rows-3 gap-4">
            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Apellido paterno
                </x-label>
                <x-input name="paterno" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba el apellido paterno" value="{{ $persona->paterno }}" />
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Apellido materno
                </x-label>
                <x-input name="materno" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba el apellido materno" value="{{ $persona->materno }}" />
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Nombre
                </x-label>
                <x-input name="nombre" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba el nombre de la persona" value="{{ $persona->nombre }}" />
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Tipo de documento
                </x-label>
                <select name="tipodocumento_id"
                    class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200">
                    <option value="" disabled>Seleccione el tipo de documento</option>
                    <!-- Assuming 'tipodocumentos' is an array of objects fetched from the database -->
                    @foreach ($tipodocumentos as $tipodocumento)
                        <option value="{{ $tipodocumento->id }}"
                            {{ $tipodocumento->id == $persona->tipodocumento_id ? 'selected' : '' }}>
                            {{ $tipodocumento->tipodocumento }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Cédula de identidad
                </x-label>
                <x-input name="ci" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba la cédula de identidad" value="{{ $persona->ci }}" />
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label class="mb-2 text-gray-700 dark:text-gray-300">
                    Dirección
                </x-label>
                <x-input name="direccion" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba la dirección" value="{{ $persona->direccion }}" />
            </div>
        </div>
        <br>



        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.personas.index') }}"
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
    </form>
</x-jet-admin::dashboard-layout>
