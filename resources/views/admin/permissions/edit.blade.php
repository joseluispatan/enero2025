<x-jet-admin::dashboard-layout>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-white">ACTUALIZAR PERMISO</h2>
        <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
            @csrf
            @method('PUT')
            <x-validation-errors class="mb-4" />
            <div class="mb-4">
                <x-label class="mb-1 text-gray-700 dark:text-gray-300">
                    Nombre del permiso
                </x-label>
                <x-input class="w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300" 
                         name="name" placeholder="Ingrese el nombre del permiso"
                         value="{{ old('name', $permission->name) }}" />
            </div>
            <div class="flex">
                <a href="{{ route('admin.permissions.index') }}"
                   class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none"
                   aria-label="Retornar a la lista de permisos">
                   <i class="fas fa-arrow-left"></i> Retornar
                </a>

                <div class="flex-1 text-center">
                    <x-button>
                        <i class="fas fa-sync"></i> Actualizar
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</x-jet-admin::dashboard-layout>