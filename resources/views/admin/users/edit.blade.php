<x-jet-admin::dashboard-layout>

    <div class="bg-white dark:bg-gray-800 rounded shadow-lg p-6">

        <form action="{{ route('admin.users.update', $user) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
                <x-input name="name" value="{{ old('name', $user->name) }}" class="w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <div class="mb-4">
                <x-label>
                    Email
                </x-label>
                <x-input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <div class="mb-4">
                <x-label>
                    Password
                </x-label>
                <x-input type="password" name="password" class="w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <div class="mb-4">
                <x-label>
                    Confirmar Password
                </x-label>
                <x-input type="password" name="password_confirmation" class="w-full dark:bg-gray-700 dark:text-white" />
            </div>

            <div class="mb-4">
                <ul>
                    @foreach ($roles as $role)
                        <li>
                            <label>
                                <x-checkbox name="roles[]" value="{{ $role->id }}" :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))" />
                                {{ $role->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex">
                <a href="{{ route('admin.users.index') }}"
                    class="focus:outline-none text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:ring-teal-300 font-semibold rounded-lg text-sm px-5 py-2 transition ease-in-out duration-150 hover:shadow-lg active:shadow-none"
                    aria-label="Retornar a la lista de personas">
                    <i class="fas fa-arrow-left"></i> Retornar
                </a>

                <div class="flex-1 text-center">
                    <div class="flex-1 text-center">
                        <x-button>
                            <i class="fas fa-sync"></i> Actualizar
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-jet-admin::dashboard-layout>