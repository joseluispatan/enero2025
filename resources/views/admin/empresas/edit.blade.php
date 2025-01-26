<x-jet-admin::dashboard-layout>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <div class="flex flex-col justify-center items-center">
        <h1 class="font-serif text-xl font-bold underline underline-offset-4 mb-4 text-gray-800 dark:text-gray-200">
            Editar empresa
        </h1>
    </div>

    <form action="{{ route('admin.empresas.update', $empresa) }}" method="POST"
        class="bg-white dark:bg-gray-900 rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')

        <x-validation-errors class="mb-4" />

        <div class="grid grid-cols-2 gap-4">
            @foreach ([['label' => 'Nombre de la empresa', 'name' => 'empresa', 'value' => $empresa->empresa, 'placeholder' => 'Escriba el nombre de la empresa'], ['label' => 'Número de identificación tributaria', 'name' => 'nit', 'value' => $empresa->nit, 'placeholder' => 'Escriba el NIT']] as $field)
                <div class="flex flex-col p-4 bg-gray-300 dark:bg-gray-700">
                    <x-label>{{ $field['label'] }}</x-label>
                    <x-input name="{{ $field['name'] }}"
                        class="w-full bg-white dark:bg-gray-600 text-gray-900 dark:text-gray-200"
                        placeholder="{{ $field['placeholder'] }}" value="{{ $field['value'] }}" />
                </div>
            @endforeach
        </div>
<br>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.empresas.index') }}"
                class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none flex items-center h-10"
                aria-label="Retornar a la lista de empresas">
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
