<x-jet-admin::dashboard-layout>
            <x-slot name="header">
                    {{ __('Crear roles') }}
            </x-slot>
            @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif
        
       
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    
                  
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    
                    <div class="card-body table-full-width table-responsive m-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <form action="{{ route('admin.roles.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="name" class="block mb-1 text-sm font-black text-gray-900 dark:text-white">Nombre:</label>
                                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light valid:border-green-700" placeholder="Introdusca el nombre del rol de usuario" required>
                                        </div>
                                        <h3 class="h3 mb-2 underline font-black ">Lista de permisos:</h3>
                                        <div class="grid grid-cols-4 gap-4">
                                        @foreach ($permissions as $permission)
                                     
                                        <div class="flex items-center mb-1">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox h-4 w-4 text-indigo-600 mr-2">
                                            <span class="text-gray-900">{{ $permission->name }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="mt-4 bg-purple-700 hover:bg-purple-800 rounded-full text-white font-semibold py-2 px-11 ">
                                            Crear Rol
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                
                               
                                


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
  
                
                </div>
          
            </div>
            
            
</x-jet-admin::dashboard-layout>