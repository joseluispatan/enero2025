<x-jet-admin::dashboard-layout>

<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">CREAR PERMISO</h2>
        <form action="{{route('admin.permissions.store')}}" method="POST">

            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre del permiso
                </x-label>
                <x-input class="w-full"
                    name="name"
                    placeholder="Ingrese el nombre del permiso"
                    value="{{old('name')}}" />
            </div>
            <div class="flex items-center space-x-4"> <!-- Contenedor flex para alinear los botones -->
                <a href="{{ route('admin.permissions.index') }}"
                    class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none"
                    aria-label="Retornar a la lista de personas">
                    <i class="fas fa-arrow-left"></i> Retornar
                </a>
                <div class="flex-1"> <!-- Cambié este div para que no sea 'text-center' -->
                    <x-button class="flex items-center justify-center h-full"> <!-- Asegúrate de que el botón también ocupa el espacio completo -->
                        <i class="fa-solid fa-user-tag"></i> <span style="padding-left: 0.5rem;">Crear Permiso</span>
                    </x-button>
                </div>
            </div>

            
        </form>

    </div>

</x-jet-admin::dashboard-layout>