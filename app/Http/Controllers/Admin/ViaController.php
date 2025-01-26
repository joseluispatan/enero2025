<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Revestimiento;
use App\Models\Via;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ViaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vias = Via::select('id', 'nombre', 'ancho', 'revestimiento_id', DB::raw("ST_AsGeoJSON(ST_Transform(geom,4326)) as geojson"))->get();
        $jsonFeatures = [];
        foreach ($vias as $via) {
            $feature = [
                "type" => "Feature",
                "geometry" => json_decode($via->geojson),
                "properties" => [
                    "id" => $via->id,
                    "nombre" => $via->nombre,
                    "ancho" => $via->ancho,
                    "revestimiiento_id" => $via->revestimiento_id,

                ]
            ];
            $jsonFeatures[] = $feature;
        }
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $jsonFeatures
        ];
        return view('admin.vias.index', compact('featureCollection'));
    }

   
    public function create(): View
    {
        $via = new via();

        return view('admin.via.create', compact('via'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Via::create($request->validated());
       

        return Redirect::route('admin.via.index')
            ->with('success', 'Edificacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $via = Via::find($id);

        return view('admin.via.show', compact('via'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $via = Via::find($id);
        $revestimientos = Revestimiento::all();
       
        return view('admin.vias.edit', compact(
            'via',
            'revestimientos'
           
        ));

    }

    /**
     * Update the specified resource in storage.
     */
    
     public function update(Request $request, $id)
     {
     // Encuentra la vía por ID
     $via = Via::find($id);

         // Verifica si la vía fue encontrada
         if (!$via) {
             return redirect()->back()->with('error', 'Vía no encontrada.');
         }
         // Valida los datos del request
         $request->validate([
     
             'nombre' => 'required|string|max:255',
             'ancho' => 'nullable|numeric',
             'revestimiento_id' => 'nullable|exists:revestimientos,id', // Asegúrate que el ID exista en la tabla correspondiente
         ]);
         // Asigna los valores del request a los campos del modelo
         $via->nombre = $request->input('nombre');
         $via->ancho = $request->input('ancho');
         $via->revestimiento_id = $request->input('revestimiento_id');
         // Guarda los cambios en la base de datos
         $via->save();
         // Redirige a donde desees con un mensaje de éxito
         return redirect()->route('admin.vias.index')->with('success', 'Vía actualizada correctamente.');
     
     }

    public function destroy($id): RedirectResponse
    {
        Via::find($id)->delete();

        return Redirect::route('admin.vias.index')
            ->with('success', 'Edificacion deleted successfully');
    }
}
