<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Predio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PredioRequest;
use App\Models\Adquisicion;
use App\Models\Docpropiedad;
use App\Models\Empresa;
use App\Models\Forma;
use App\Models\Persona;
use App\Models\Personalidad;
use App\Models\Razonsocial;
use App\Models\Revestimiento;
use App\Models\Servicio;
use App\Models\Tipodocumento;
use App\Models\Titularidad;
use App\Models\Topografico;
use App\Models\Ubicacion;
use App\Models\Via;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
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
        return view('admin.predios.index', compact('featureCollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $predio = new Predio();

        return view('admin.predios.create', compact('predio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'personas' => 'array', // Asegúrate de que sea un array
            'personas.*' => 'exists:personas,id', // Valida que cada ID exista en la tabla personas

        ]);

        // Procesa los datos
        $predio = Predio::find($request->predio_id); // Asegúrate de tener el ID del predio
        $predio->personas()->sync($request->personas); // Sincroniza las personas seleccionadas

        return redirect()->back()->with('success', 'Personas actualizadas correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $predio = Predio::find($id);

        return view('admin.predios.show', compact('predio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $predio = Predio::find($id);
        $personalidads = Personalidad::all();
        $personas = Persona::all();
        $empresas = Empresa::all();
        $razonsocials = Razonsocial::all();
        $titularidads = Titularidad::all();
        $docpropiedads = Docpropiedad::all();
        $adquisicions = Adquisicion::all();
        $vias = Via::all();
        $revestimientos = Revestimiento::all();
        $ubicacions = Ubicacion::all();
        $formas = Forma::all();
        $topograficos = Topografico::all();
        $servicios = Servicio::all();


        return view('admin.predios.edit', compact('predio', 'personalidads', 'personas', 'empresas', 'razonsocials', 'titularidads', 'docpropiedads', 'adquisicions', 'vias', 'revestimientos', 'ubicacions', 'formas', 'topograficos', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $predio = Predio::find($id);

        // Array con los campos que se quieren actualizar
        $campos = [
            'propietari',
            'numero',
            'ci',
            'numpropiedad',
            'suptestimo',
            'supemedici',
            'supcedida',
            'suputil',
            'tros',
            'via_id',
            'topografico_id',
            'forma_id',
            'ubicacion_id',
            'servicio_id',
            'ff_id',
            'vz',
            'paterno',
            'materno',
            'nombre1',
            'nombre2',
            'tipodocumento_id',
            'personalidad_id',
            'razonsocial_id',
            'titularidad_id',
            'docpropiedad_id',
            'adquisicion_id',
            'equipamiento_id',
            'frente',
            'fondo',
            'observaciones',
            'revestimiento_id',
            'norte',
            'sur',
            'este',
            'oeste',
            'persona_id',
            'empresa_id'
        ];

        foreach ($campos as $campo) {
            $predio->$campo = $request->$campo;
        }
        $predio->servicios()->sync($request->servicios);


        $predio->save();
        $predio->personas()->sync($request->input('personas', [])); // Sincroniza personas
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El predio se actualizó correctamente.',
        ]);
        return redirect()->route('admin.predios.index');
    }

    public function destroy($id): RedirectResponse
    {
        Predio::find($id)->delete();

        return Redirect::route('admin.predios.index')
            ->with('success', 'Predio deleted successfully');
    }
}
