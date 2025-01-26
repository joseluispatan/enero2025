<x-jet-admin::dashboard-layout>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="text-xl font-semibold mb-2 p-2 text-gray-900 dark:text-white">Lista de Roles al Rol</h2>

        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            @if (session()->has('message'))
                <div class="bg-teal-400 dark:bg-teal-600 rounded-b text-white px-3 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">

                                <div class="card-body table-full-width table-responsive m-3">
                                    <a href="{{ route('admin.roles.create') }}" class="">
                                        <button class="font-medium rounded-lg bg-green-600 dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-800 text-white px-2 py-2">
                                            Agregar rol
                                        </button>
                                    </a>

                                    @if (session('info'))
                                        <div class="alert alert-success">
                                            {{ session('info') }}
                                        </div>
                                    @endif

                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <table class="table table-striped border border-neutral-200 dark:border-neutral-600">
                                                <thead class="border-b bg-neutral-200 dark:bg-neutral-700 border-neutral-200 dark:border-neutral-600 hover:bg-neutral-200 dark:hover:bg-neutral-600">
                                                    <tr>
                                                        <th class="px-4 py-2 text-gray-900 dark:text-white">#</th>
                                                        <th class="px-4 py-2 text-gray-900 dark:text-white">Roles</th>
                                                        <th colspan="2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $role)
                                                        <tr class="border-b border-neutral-200 dark:border-neutral-600 hover:bg-neutral-200 dark:hover:bg-neutral-600">
                                                            <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $role->id }}</td>
                                                            <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $role->name }}</td>
                                                            <td class="px-4 py-2 flex justify-end gap-1">
                                                                <a href="{{ route('admin.roles.edit', $role) }}" class="">
                                                                    <button class="rounded-lg bg-green-600 dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-800 text-white p-1">
                                                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                        </svg>
                                                                    </button>
                                                                </a>
                                                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="rounded-lg p-1 btn btn-sm bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white">
                                                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polyline points="3 6 5 6 21 6" />
                                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                                            <line x1="10" y1="11" x2="10" y2="17" />
                                                                            <line x1="14" y1="11" x2="14" y2="17" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
