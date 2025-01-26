<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edificacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EdificacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Acabado;
use App\Models\Carpinteria;
use App\Models\Cimiento;
use App\Models\Cubierta;
use App\Models\Destino;
use App\Models\Estructura;
use App\Models\Muro;
use App\Models\Revexterno;
use App\Models\Revinterno;
use Illuminate\Support\Facades\DB;

class EdificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $edificacions = Edificacion::select('id', 'bloque', 'codigo', 'piso', DB::raw("ST_AsGeoJSON(ST_Transform(geom,4326)) as geojson"))->get();
        $jsonFeatures = [];
        foreach ($edificacions as $edificacion) {
            $feature = [
                "type" => "Feature",
                "geometry" => json_decode($edificacion->geojson),
                "properties" => [
                    "id" => $edificacion->id,
                    "piso" => $edificacion->piso,
                    "codigo" => $edificacion->codigo,
                    "bloque" => $edificacion->bloque,

                ]
            ];
            $jsonFeatures[] = $feature;
        }
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $jsonFeatures
        ];
        return view('admin.edificacion.index', compact('featureCollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $edificacion = new Edificacion();

        return view('admin.edificacion.create', compact('edificacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Edificacion::create($request->validated());
       

        return Redirect::route('admin.edificacion.index')
            ->with('success', 'Edificacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $edificacion = Edificacion::find($id);

        return view('admin.edificacion.show', compact('edificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $edificacion = Edificacion::find($id);
        $cimientos = Cimiento::all();
        $estructuras = Estructura::all();
        $muros = Muro::all();
        $revexternos = Revexterno::all();
        $cubiertas = Cubierta::all();
        $revinternos = Revinterno::all();
        $acabados = Acabado::all();
        $carpinterias = Carpinteria::all();
        $destinos = Destino::all();

        return view('admin.edificacion.edit', compact(
            'edificacion',
            'cimientos',
            'estructuras',
            'muros',
            'revexternos',
            'cubiertas',
            'revinternos',
            'acabados',
            'carpinterias',
            'destinos'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $edificacion = Edificacion::find($id);
        

        // Array con los campos que se quieren actualizar
        $campos = [
                 
                'piso', 
                'bloque',
                'kk1',
                'cimiento_id',
                'estructura_id',
                'muro_id',
                'revexterno_id',
                'cubierta_id',
                'revinterno_id',
                'acabado_id',
                'carpinteria_id',
                'destino_id'
                ];
    
        foreach ($campos as $campo) {
            $edificacion->$campo = $request->$campo;
         }
         $edificacion->fecha_edificacion = $request->input('fecha_edificacion');
       
        $edificacion->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'la edificación se actualizó correctamente.',
        ]);
       return redirect()->route('admin.edificacions.index');
    }

    public function destroy($id): RedirectResponse
    {
        Edificacion::find($id)->delete();

        return Redirect::route('admin.edificacions.index')
            ->with('success', 'Edificacion deleted successfully');
    }
}
