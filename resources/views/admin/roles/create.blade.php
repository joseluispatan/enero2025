<x-jet-admin::dashboard-layout>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-white">CREAR ROL</h2>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label class="mb-1 text-gray-700 dark:text-gray-300">
                    Nombre del rol
                </x-label>
                <x-input class="w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200" name="name" placeholder="Ingrese el nombre del rol"
                    value="{{ old('name') }}" />
            </div>

            <div class="mb-4">
                <ul class="space-y-2">
                    @foreach ($permissions as $permission)
                        <li>
                            <label class="flex items-center text-gray-700 dark:text-gray-300">
                                <x-checkbox class="text-teal-600 dark:text-teal-400" name="permissions[]" value="{{ $permission->id }}" :checked="in_array($permission->id, old('permissions', []))" />
                                <span class="ml-2">{{ $permission->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex items-center space-x-4"> <!-- Contenedor flex para alinear los botones -->
                <a href="{{ route('admin.roles.index') }}"
                    class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none h-full flex items-center"
                    aria-label="Retornar a la lista de personas">
                    <i class="fas fa-arrow-left"></i> Retornar
                </a>
                <div class="flex-1 flex justify-center"> <!-- Flex para centrar el botón -->
                    <x-button class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 flex items-center h-full">
                        <i class="fa-solid fa-user-tag"></i> <span class="ml-2">Crear Rol</span>
                    </x-button>
                </div>
            </div>

        </form>

    </div>

</x-jet-admin::dashboard-layout>

