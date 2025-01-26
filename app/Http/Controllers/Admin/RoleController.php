<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('can:ver roles')->only('index'); */
        //$this->middleware('can:Editar roles')->only('edit, update');
        //$this->middleware('can:Crear roles')->only('create, store');
        /* $this->middleware('can:eliminar empresas')->only('destroy'); */
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function store(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index', $role)->with('info', 'el rol se creo correctamente');
    }
    public function update(Request $request, Role $role) {
       $request->validate([
            'name' => 'required'
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        // Almacena el mensaje en la sesión
    
        session()->flash('message', 'El rol se actualizó correctamente.');
        return redirect()->route('admin.roles.index');
    
    }
    public function destroy($id)
    {
        // Encuentra el rol por ID
        $role = Role::find($id);
        // Verifica si el rol existe
        if (!$role) {
            return redirect()->route('admin.roles.index')->with('error', 'Rol no encontrado.');
        }
        // Elimina el rol
        $role->delete();
        // Redirige con un mensaje de éxito
        return redirect()->route('admin.roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
