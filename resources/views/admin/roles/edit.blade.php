<x-jet-admin::dashboard-layout>
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-white">EDITAR ROL</h2>
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <x-validation-errors class="mb-4" />
            <div class="mb-4">
                <x-label class="mb-1 text-gray-700 dark:text-gray-300">
                    Nombre del rol
                </x-label>
                <x-input class="w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-300" 
                         name="name" placeholder="Ingrese el nombre del rol"
                         value="{{ old('name', $role->name) }}" />
            </div>
            <div class="mb-4">
                <ul>
                    @foreach ($permissions as $permission)
                        <li>
                            <label class="flex items-center">
                                <x-checkbox name="permissions[]" value="{{ $permission->id }}" 
                                            :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()))" />
                                <span class="ml-2 text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex">
                <a href="{{ route('admin.roles.index') }}"
                   class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none"
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
        @if(session()->has('message'))
        <div class="max-w-md mx-auto mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
        @endif
    </div>
   
</x-jet-admin::dashboard-layout>

