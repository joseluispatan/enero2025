@extends('layouts.app')

@section('template_title')
    {{ $predio->name ?? __('Show') . " " . __('Predio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Predio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('predios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Geom:</strong>
                                    {{ $predio->geom }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fid :</strong>
                                    {{ $predio->fid_ }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Entity:</strong>
                                    {{ $predio->entity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numero:</strong>
                                    {{ $predio->numero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo:</strong>
                                    {{ $predio->codigo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Propietari:</strong>
                                    {{ $predio->propietari }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ci:</strong>
                                    {{ $predio->ci }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Manzana Id:</strong>
                                    {{ $predio->manzana_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numpropiedad:</strong>
                                    {{ $predio->numpropiedad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Suptestimo:</strong>
                                    {{ $predio->suptestimo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Supemedici:</strong>
                                    {{ $predio->supemedici }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Supcedida:</strong>
                                    {{ $predio->supcedida }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Suputil:</strong>
                                    {{ $predio->suputil }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tros:</strong>
                                    {{ $predio->tros }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tc X:</strong>
                                    {{ $predio->tc_x }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tc Y:</strong>
                                    {{ $predio->tc_y }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Radio:</strong>
                                    {{ $predio->radio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Via Id:</strong>
                                    {{ $predio->via_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Topografico Id:</strong>
                                    {{ $predio->topografico_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Forma Id:</strong>
                                    {{ $predio->forma_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ubicacion Id:</strong>
                                    {{ $predio->ubicacion_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Servicio Id:</strong>
                                    {{ $predio->servicio_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ff Id:</strong>
                                    {{ $predio->ff_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vz:</strong>
                                    {{ $predio->vz }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Paterno:</strong>
                                    {{ $predio->paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Materno:</strong>
                                    {{ $predio->materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre1:</strong>
                                    {{ $predio->nombre1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre2:</strong>
                                    {{ $predio->nombre2 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipodocumento Id:</strong>
                                    {{ $predio->tipodocumento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Personalidad Id:</strong>
                                    {{ $predio->personalidad_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Razonsocial Id:</strong>
                                    {{ $predio->razonsocial_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Titularidad Id:</strong>
                                    {{ $predio->titularidad_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Docpropiedad Id:</strong>
                                    {{ $predio->docpropiedad_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Adquisicion Id:</strong>
                                    {{ $predio->adquisicion_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Equipamiento Id:</strong>
                                    {{ $predio->equipamiento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Frente:</strong>
                                    {{ $predio->frente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fondo:</strong>
                                    {{ $predio->fondo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Observaciones:</strong>
                                    {{ $predio->observaciones }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Revestimiento Id:</strong>
                                    {{ $predio->revestimiento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tc Ancho:</strong>
                                    {{ $predio->tc_ancho }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tc Alto:</strong>
                                    {{ $predio->tc_alto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Norte:</strong>
                                    {{ $predio->norte }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sur:</strong>
                                    {{ $predio->sur }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Este:</strong>
                                    {{ $predio->este }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Oeste:</strong>
                                    {{ $predio->oeste }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Area:</strong>
                                    {{ $predio->area }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Perimetro:</strong>
                                    {{ $predio->perimetro }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Energia:</strong>
                                    {{ $predio->energia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Zh Id:</strong>
                                    {{ $predio->zh_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Distrito Id:</strong>
                                    {{ $predio->distrito_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Urbanizacion Id:</strong>
                                    {{ $predio->urbanizacion_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Urbanizaci:</strong>
                                    {{ $predio->urbanizaci }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombrevia:</strong>
                                    {{ $predio->nombrevia }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
