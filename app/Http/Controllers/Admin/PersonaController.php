<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Tipodocumento;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::latest('id');
        return view('admin.personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persona = new Persona();
        $tipodocumentos = Tipodocumento::all();

        return view('admin.personas.create', compact('persona', 'tipodocumentos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paterno' => 'required|string|max:100',
            'materno' => 'required|string|max:100',
            'nombre' => 'required|string|max:100',
        ]);
        Persona::create($request->all());
        session()->flash('message', 'La persona se creó correctamente.');
        return redirect()->route('admin.personas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return view('admin.personas.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $tipodocumentos = Tipodocumento::all();

        return view('admin.personas.edit', compact('persona', 'tipodocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $persona->update($request->all());
        $request->validate([
            'paterno' => 'required|string|max:100',
            'materno' => 'required|string|max:100',
            'nombre' => 'required|string|max:100',
        ]);

        session()->flash('message', 'La persona se actualizó correctamente.');

        return redirect()->route('admin.personas.index', $persona);
    }
}
