<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Predio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PredioRequest;
use App\Models\Adquisicion;
use App\Models\Distrito;
use App\Models\Docpropiedad;
use App\Models\Empresa;
use App\Models\Forma;
use App\Models\Manzana;
use App\Models\Persona;
use App\Models\Personalidad;
use App\Models\Razonsocial;
use App\Models\Revestimiento;
use App\Models\Servicio;
use App\Models\Tipodocumento;
use App\Models\Titularidad;
use App\Models\Topografico;
use App\Models\Ubicacion;
use App\Models\Urbanizacione;
use App\Models\Via;
use App\Models\Zh;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$prediosos = Predio::all();
        $predios = Predio::select('id', 'numero', 'codigo', 'propietari', DB::raw("ST_AsGeoJSON(ST_Transform(geom,4326)) as geojson"))->get();
        $jsonFeatures = [];
            foreach ($predios as $predio) {
                $feature = [
                    "type" => "Feature",
                    "geometry" => json_decode($predio->geojson),
                    "properties" => [
                        "id" => $predio->id,
                        "numero" => $predio->numero,
                        "codigo" => $predio->codigo,
                        "propietari" => $predio->propietari,
                        
                    ]
                ];
                $jsonFeatures[] = $feature;
            }
            $featureCollection = [
                "type" => "FeatureCollection",
                "features" => $jsonFeatures
            ];
                return view('reporte.index', compact('featureCollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function pdf($id)
    {
        $predio = Predio::find($id);
        $urbanizaciones = Urbanizacione::all();
        $zhs = Zh::all();
        $distritos = Distrito::all();
        $manzanas = Manzana::all();
        $vias = Via::all();
        $revestimientos = Revestimiento::all();
        $topograficos = Topografico::all();
        $formas = Forma::all();
        $ubicacions = Ubicacion::all();
        $tipodocumentos = Tipodocumento::all();
        $personalidads = Personalidad::all();
        $razonsocials = Razonsocial::all();
        $titularidads = Titularidad::all();
        $docpropiedads = Docpropiedad::all();
        $adquisicions = Adquisicion::all();
        $servicios = Servicio::all();
        $pred = Predio::select('id', 'numero', 'codigo', 'propietari',) 
        ->selectRaw("ST_AsGeoJSON(ST_Transform(geom,4326)) as geojson")
            ->where('id', $id)
            ->first();
            $feature = [
                "type" => "Feature",
                "geometry" => json_decode($pred->geojson),
                "properties" => [
                    "id" => $pred->id,
                    "numero" => $pred->numero,
                    "codigo" => $pred->codigo,
                    "propietari" => $pred->propietari,
                    "coordenadas" => $pred->coordinates
                ]
            ];
            $predito = [
                "type" => "FeatureCollection",
                "features" => [$feature]
            ];
        return view('reporte.pdf', compact('predio',
        'zhs', 
        'distritos', 
        'manzanas', 
        'vias', 
        'urbanizaciones', 
        'revestimientos',
        'topograficos',
        'formas',
        'ubicacions',
        'tipodocumentos',
        'personalidads',
        'razonsocials',
        'titularidads',
        'docpropiedads',
        'adquisicions',
        'servicios', 
        'predito'

        ));
        
        //return $pdf->stream('reporte.pdf');
    }
}
