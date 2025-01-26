<x-jet-admin::dashboard-layout>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>
    <div class="flex flex-col justify-center items-center"> <!-- Ajusta h-screen según sea necesario -->
        <h1
            class="font-serif text-xl font-bold underline underline-offset-4 mb-4 
                   text-gray-800 dark:text-gray-200">
            Crear Empresa
        </h1>
    </div>
    <form action="{{ route('admin.empresas.store') }}" method="POST"
        class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
        @csrf
        <x-validation-errors class="mb-4" />

        <div class="grid grid-cols-2 grid-rows-1 gap-4">
            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label>
                    Empresa
                </x-label>
                <x-input name="empresa" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba el nombre de la empresa" />
            </div>

            <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                <x-label>
                    Número de identificación tributaria
                </x-label>
                <x-input name="nit" class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                    placeholder="Escriba el NIT" />
            </div>

        </div>
<br>
        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('admin.empresas.index') }}"
                class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none flex items-center h-10"
                aria-label="Retornar a la lista de empresas">
                <i class="fas fa-arrow-left"></i> Retornar
            </a>
            <div class="flex-grow flex justify-center">
                <button type="submit"
                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 flex items-center h-10">
                    <i class="fas fa-user-plus"></i> <span style="padding-left: 0.5rem;">Crear empresa</span>
                </button>
            </div>
        </div>

    </form>
</x-jet-admin::dashboard-layout>
