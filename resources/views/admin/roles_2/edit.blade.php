<x-jet-admin::dashboard-layout>
    <x-slot name="header">
            {{ __('Asignar permisos al rol') }}
    </x-slot>
    
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div>
        @if (session('info'))

    <div class="alert alert-success  text-center text-white font-bold bg-green-400 p-3">
        {{session('info')}}
    </div>

    @endif
    </div>
        <div class="p-6 border-b border-gray-200">
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                        @method('PUT')
                        @csrf
                
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-gray-700">Rol:</label>
                            <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-input mt-1 block w-full">
                        </div>
                        <div class="grid grid-cols-4">
                        @foreach ($permissions as $permission)
        
            <div class="pt-2 font-bold ">
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox h-4 w-4 text-indigo-600 mr-2"
            {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
            <span class="text-gray-700">{{ $permission->name }}</span>
        </div>
    
        @endforeach
    </div>
   


                {{-- 
                        <button type="submit" class=" mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Editar Rol
                        </button> --}}
                        <div class="py-3 flex flex-col items-center ">

                            <button type="submit"
                                class="bg-violet-900 hover:bg-violet-950 text-white font-bold py-2 px-16 rounded-full">
                                GUARDAR</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
  
    </div>
</x-jet-admin::dashboard-layout>
