<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::latest('id');
        return view('admin.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = new Empresa();

        return view('admin.empresas.create', compact('empresa'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|string|max:100',
            'nit' => 'required|string|max:100',
        ]);
        Empresa::create($request->all());
        session()->flash('message', 'La empresa se creó correctamente.');
        return redirect()->route('admin.empresas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa$empresa)
    {
        return view('admin.empresas.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa$empresa)
    {

        return view('admin.empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa$empresa)
    {
        $empresa->update($request->all());
        $request->validate([
            'empresa' => 'required|string|max:100',
            'nit' => 'required|string|max:100',

        ]);

        session()->flash('message', 'La Empresase actualizó correctamente.');

        return redirect()->route('admin.empresas.index', $empresa);
    }
}
