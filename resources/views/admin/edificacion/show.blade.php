@extends('layouts.app')

@section('template_title')
    {{ $edificacion->name ?? __('Show') . " " . __('Edificacion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Edificacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('edificacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Geom:</strong>
                                    {{ $edificacion->geom }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fid :</strong>
                                    {{ $edificacion->fid_ }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Entity:</strong>
                                    {{ $edificacion->entity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo:</strong>
                                    {{ $edificacion->codigo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bloque:</strong>
                                    {{ $edificacion->bloque }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Piso:</strong>
                                    {{ $edificacion->piso }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Kk1:</strong>
                                    {{ $edificacion->kk1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Edificacion:</strong>
                                    {{ $edificacion->fecha_edificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cimiento Id:</strong>
                                    {{ $edificacion->cimiento_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estructura Id:</strong>
                                    {{ $edificacion->estructura_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Muro Id:</strong>
                                    {{ $edificacion->muro_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Revexterno Id:</strong>
                                    {{ $edificacion->revexterno_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cubierta Id:</strong>
                                    {{ $edificacion->cubierta_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Revinterno Id:</strong>
                                    {{ $edificacion->revinterno_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Acabado Id:</strong>
                                    {{ $edificacion->acabado_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Carpinteria Id:</strong>
                                    {{ $edificacion->carpinteria_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Destino Id:</strong>
                                    {{ $edificacion->destino_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
