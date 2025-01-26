<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="geom" class="form-label">{{ __('Geom') }}</label>
            <input type="text" name="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom', $predio?->geom) }}" id="geom" placeholder="Geom">
            {!! $errors->first('geom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fid_" class="form-label">{{ __('Fid ') }}</label>
            <input type="text" name="fid_" class="form-control @error('fid_') is-invalid @enderror" value="{{ old('fid_', $predio?->fid_) }}" id="fid_" placeholder="Fid ">
            {!! $errors->first('fid_', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entity" class="form-label">{{ __('Entity') }}</label>
            <input type="text" name="entity" class="form-control @error('entity') is-invalid @enderror" value="{{ old('entity', $predio?->entity) }}" id="entity" placeholder="Entity">
            {!! $errors->first('entity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero" class="form-label">{{ __('Numero') }}</label>
            <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero', $predio?->numero) }}" id="numero" placeholder="Numero">
            {!! $errors->first('numero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $predio?->codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="propietari" class="form-label">{{ __('Propietari') }}</label>
            <input type="text" name="propietari" class="form-control @error('propietari') is-invalid @enderror" value="{{ old('propietari', $predio?->propietari) }}" id="propietari" placeholder="Propietari">
            {!! $errors->first('propietari', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ci" class="form-label">{{ __('Ci') }}</label>
            <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ old('ci', $predio?->ci) }}" id="ci" placeholder="Ci">
            {!! $errors->first('ci', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="manzana_id" class="form-label">{{ __('Manzana Id') }}</label>
            <input type="text" name="manzana_id" class="form-control @error('manzana_id') is-invalid @enderror" value="{{ old('manzana_id', $predio?->manzana_id) }}" id="manzana_id" placeholder="Manzana Id">
            {!! $errors->first('manzana_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numpropiedad" class="form-label">{{ __('Numpropiedad') }}</label>
            <input type="text" name="numpropiedad" class="form-control @error('numpropiedad') is-invalid @enderror" value="{{ old('numpropiedad', $predio?->numpropiedad) }}" id="numpropiedad" placeholder="Numpropiedad">
            {!! $errors->first('numpropiedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="suptestimo" class="form-label">{{ __('Suptestimo') }}</label>
            <input type="text" name="suptestimo" class="form-control @error('suptestimo') is-invalid @enderror" value="{{ old('suptestimo', $predio?->suptestimo) }}" id="suptestimo" placeholder="Suptestimo">
            {!! $errors->first('suptestimo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="supemedici" class="form-label">{{ __('Supemedici') }}</label>
            <input type="text" name="supemedici" class="form-control @error('supemedici') is-invalid @enderror" value="{{ old('supemedici', $predio?->supemedici) }}" id="supemedici" placeholder="Supemedici">
            {!! $errors->first('supemedici', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="supcedida" class="form-label">{{ __('Supcedida') }}</label>
            <input type="text" name="supcedida" class="form-control @error('supcedida') is-invalid @enderror" value="{{ old('supcedida', $predio?->supcedida) }}" id="supcedida" placeholder="Supcedida">
            {!! $errors->first('supcedida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="suputil" class="form-label">{{ __('Suputil') }}</label>
            <input type="text" name="suputil" class="form-control @error('suputil') is-invalid @enderror" value="{{ old('suputil', $predio?->suputil) }}" id="suputil" placeholder="Suputil">
            {!! $errors->first('suputil', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tros" class="form-label">{{ __('Tros') }}</label>
            <input type="text" name="tros" class="form-control @error('tros') is-invalid @enderror" value="{{ old('tros', $predio?->tros) }}" id="tros" placeholder="Tros">
            {!! $errors->first('tros', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tc_x" class="form-label">{{ __('Tc X') }}</label>
            <input type="text" name="tc_x" class="form-control @error('tc_x') is-invalid @enderror" value="{{ old('tc_x', $predio?->tc_x) }}" id="tc_x" placeholder="Tc X">
            {!! $errors->first('tc_x', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tc_y" class="form-label">{{ __('Tc Y') }}</label>
            <input type="text" name="tc_y" class="form-control @error('tc_y') is-invalid @enderror" value="{{ old('tc_y', $predio?->tc_y) }}" id="tc_y" placeholder="Tc Y">
            {!! $errors->first('tc_y', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="radio" class="form-label">{{ __('Radio') }}</label>
            <input type="text" name="radio" class="form-control @error('radio') is-invalid @enderror" value="{{ old('radio', $predio?->radio) }}" id="radio" placeholder="Radio">
            {!! $errors->first('radio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="via_id" class="form-label">{{ __('Via Id') }}</label>
            <input type="text" name="via_id" class="form-control @error('via_id') is-invalid @enderror" value="{{ old('via_id', $predio?->via_id) }}" id="via_id" placeholder="Via Id">
            {!! $errors->first('via_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="topografico_id" class="form-label">{{ __('Topografico Id') }}</label>
            <input type="text" name="topografico_id" class="form-control @error('topografico_id') is-invalid @enderror" value="{{ old('topografico_id', $predio?->topografico_id) }}" id="topografico_id" placeholder="Topografico Id">
            {!! $errors->first('topografico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="forma_id" class="form-label">{{ __('Forma Id') }}</label>
            <input type="text" name="forma_id" class="form-control @error('forma_id') is-invalid @enderror" value="{{ old('forma_id', $predio?->forma_id) }}" id="forma_id" placeholder="Forma Id">
            {!! $errors->first('forma_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ubicacion_id" class="form-label">{{ __('Ubicacion Id') }}</label>
            <input type="text" name="ubicacion_id" class="form-control @error('ubicacion_id') is-invalid @enderror" value="{{ old('ubicacion_id', $predio?->ubicacion_id) }}" id="ubicacion_id" placeholder="Ubicacion Id">
            {!! $errors->first('ubicacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="servicio_id" class="form-label">{{ __('Servicio Id') }}</label>
            <input type="text" name="servicio_id" class="form-control @error('servicio_id') is-invalid @enderror" value="{{ old('servicio_id', $predio?->servicio_id) }}" id="servicio_id" placeholder="Servicio Id">
            {!! $errors->first('servicio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ff_id" class="form-label">{{ __('Ff Id') }}</label>
            <input type="text" name="ff_id" class="form-control @error('ff_id') is-invalid @enderror" value="{{ old('ff_id', $predio?->ff_id) }}" id="ff_id" placeholder="Ff Id">
            {!! $errors->first('ff_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="vz" class="form-label">{{ __('Vz') }}</label>
            <input type="text" name="vz" class="form-control @error('vz') is-invalid @enderror" value="{{ old('vz', $predio?->vz) }}" id="vz" placeholder="Vz">
            {!! $errors->first('vz', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="paterno" class="form-label">{{ __('Paterno') }}</label>
            <input type="text" name="paterno" class="form-control @error('paterno') is-invalid @enderror" value="{{ old('paterno', $predio?->paterno) }}" id="paterno" placeholder="Paterno">
            {!! $errors->first('paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="materno" class="form-label">{{ __('Materno') }}</label>
            <input type="text" name="materno" class="form-control @error('materno') is-invalid @enderror" value="{{ old('materno', $predio?->materno) }}" id="materno" placeholder="Materno">
            {!! $errors->first('materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre1" class="form-label">{{ __('Nombre1') }}</label>
            <input type="text" name="nombre1" class="form-control @error('nombre1') is-invalid @enderror" value="{{ old('nombre1', $predio?->nombre1) }}" id="nombre1" placeholder="Nombre1">
            {!! $errors->first('nombre1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre2" class="form-label">{{ __('Nombre2') }}</label>
            <input type="text" name="nombre2" class="form-control @error('nombre2') is-invalid @enderror" value="{{ old('nombre2', $predio?->nombre2) }}" id="nombre2" placeholder="Nombre2">
            {!! $errors->first('nombre2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipodocumento_id" class="form-label">{{ __('Tipodocumento Id') }}</label>
            <input type="text" name="tipodocumento_id" class="form-control @error('tipodocumento_id') is-invalid @enderror" value="{{ old('tipodocumento_id', $predio?->tipodocumento_id) }}" id="tipodocumento_id" placeholder="Tipodocumento Id">
            {!! $errors->first('tipodocumento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="personalidad_id" class="form-label">{{ __('Personalidad Id') }}</label>
            <input type="text" name="personalidad_id" class="form-control @error('personalidad_id') is-invalid @enderror" value="{{ old('personalidad_id', $predio?->personalidad_id) }}" id="personalidad_id" placeholder="Personalidad Id">
            {!! $errors->first('personalidad_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="razonsocial_id" class="form-label">{{ __('Razonsocial Id') }}</label>
            <input type="text" name="razonsocial_id" class="form-control @error('razonsocial_id') is-invalid @enderror" value="{{ old('razonsocial_id', $predio?->razonsocial_id) }}" id="razonsocial_id" placeholder="Razonsocial Id">
            {!! $errors->first('razonsocial_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="titularidad_id" class="form-label">{{ __('Titularidad Id') }}</label>
            <input type="text" name="titularidad_id" class="form-control @error('titularidad_id') is-invalid @enderror" value="{{ old('titularidad_id', $predio?->titularidad_id) }}" id="titularidad_id" placeholder="Titularidad Id">
            {!! $errors->first('titularidad_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="docpropiedad_id" class="form-label">{{ __('Docpropiedad Id') }}</label>
            <input type="text" name="docpropiedad_id" class="form-control @error('docpropiedad_id') is-invalid @enderror" value="{{ old('docpropiedad_id', $predio?->docpropiedad_id) }}" id="docpropiedad_id" placeholder="Docpropiedad Id">
            {!! $errors->first('docpropiedad_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="adquisicion_id" class="form-label">{{ __('Adquisicion Id') }}</label>
            <input type="text" name="adquisicion_id" class="form-control @error('adquisicion_id') is-invalid @enderror" value="{{ old('adquisicion_id', $predio?->adquisicion_id) }}" id="adquisicion_id" placeholder="Adquisicion Id">
            {!! $errors->first('adquisicion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="equipamiento_id" class="form-label">{{ __('Equipamiento Id') }}</label>
            <input type="text" name="equipamiento_id" class="form-control @error('equipamiento_id') is-invalid @enderror" value="{{ old('equipamiento_id', $predio?->equipamiento_id) }}" id="equipamiento_id" placeholder="Equipamiento Id">
            {!! $errors->first('equipamiento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="frente" class="form-label">{{ __('Frente') }}</label>
            <input type="text" name="frente" class="form-control @error('frente') is-invalid @enderror" value="{{ old('frente', $predio?->frente) }}" id="frente" placeholder="Frente">
            {!! $errors->first('frente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fondo" class="form-label">{{ __('Fondo') }}</label>
            <input type="text" name="fondo" class="form-control @error('fondo') is-invalid @enderror" value="{{ old('fondo', $predio?->fondo) }}" id="fondo" placeholder="Fondo">
            {!! $errors->first('fondo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="observaciones" class="form-label">{{ __('Observaciones') }}</label>
            <input type="text" name="observaciones" class="form-control @error('observaciones') is-invalid @enderror" value="{{ old('observaciones', $predio?->observaciones) }}" id="observaciones" placeholder="Observaciones">
            {!! $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="revestimiento_id" class="form-label">{{ __('Revestimiento Id') }}</label>
            <input type="text" name="revestimiento_id" class="form-control @error('revestimiento_id') is-invalid @enderror" value="{{ old('revestimiento_id', $predio?->revestimiento_id) }}" id="revestimiento_id" placeholder="Revestimiento Id">
            {!! $errors->first('revestimiento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tc_ancho" class="form-label">{{ __('Tc Ancho') }}</label>
            <input type="text" name="tc_ancho" class="form-control @error('tc_ancho') is-invalid @enderror" value="{{ old('tc_ancho', $predio?->tc_ancho) }}" id="tc_ancho" placeholder="Tc Ancho">
            {!! $errors->first('tc_ancho', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tc_alto" class="form-label">{{ __('Tc Alto') }}</label>
            <input type="text" name="tc_alto" class="form-control @error('tc_alto') is-invalid @enderror" value="{{ old('tc_alto', $predio?->tc_alto) }}" id="tc_alto" placeholder="Tc Alto">
            {!! $errors->first('tc_alto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="norte" class="form-label">{{ __('Norte') }}</label>
            <input type="text" name="norte" class="form-control @error('norte') is-invalid @enderror" value="{{ old('norte', $predio?->norte) }}" id="norte" placeholder="Norte">
            {!! $errors->first('norte', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sur" class="form-label">{{ __('Sur') }}</label>
            <input type="text" name="sur" class="form-control @error('sur') is-invalid @enderror" value="{{ old('sur', $predio?->sur) }}" id="sur" placeholder="Sur">
            {!! $errors->first('sur', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="este" class="form-label">{{ __('Este') }}</label>
            <input type="text" name="este" class="form-control @error('este') is-invalid @enderror" value="{{ old('este', $predio?->este) }}" id="este" placeholder="Este">
            {!! $errors->first('este', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="oeste" class="form-label">{{ __('Oeste') }}</label>
            <input type="text" name="oeste" class="form-control @error('oeste') is-invalid @enderror" value="{{ old('oeste', $predio?->oeste) }}" id="oeste" placeholder="Oeste">
            {!! $errors->first('oeste', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="area" class="form-label">{{ __('Area') }}</label>
            <input type="text" name="area" class="form-control @error('area') is-invalid @enderror" value="{{ old('area', $predio?->area) }}" id="area" placeholder="Area">
            {!! $errors->first('area', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="perimetro" class="form-label">{{ __('Perimetro') }}</label>
            <input type="text" name="perimetro" class="form-control @error('perimetro') is-invalid @enderror" value="{{ old('perimetro', $predio?->perimetro) }}" id="perimetro" placeholder="Perimetro">
            {!! $errors->first('perimetro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="energia" class="form-label">{{ __('Energia') }}</label>
            <input type="text" name="energia" class="form-control @error('energia') is-invalid @enderror" value="{{ old('energia', $predio?->energia) }}" id="energia" placeholder="Energia">
            {!! $errors->first('energia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="zh_id" class="form-label">{{ __('Zh Id') }}</label>
            <input type="text" name="zh_id" class="form-control @error('zh_id') is-invalid @enderror" value="{{ old('zh_id', $predio?->zh_id) }}" id="zh_id" placeholder="Zh Id">
            {!! $errors->first('zh_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="distrito_id" class="form-label">{{ __('Distrito Id') }}</label>
            <input type="text" name="distrito_id" class="form-control @error('distrito_id') is-invalid @enderror" value="{{ old('distrito_id', $predio?->distrito_id) }}" id="distrito_id" placeholder="Distrito Id">
            {!! $errors->first('distrito_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="urbanizacion_id" class="form-label">{{ __('Urbanizacion Id') }}</label>
            <input type="text" name="urbanizacion_id" class="form-control @error('urbanizacion_id') is-invalid @enderror" value="{{ old('urbanizacion_id', $predio?->urbanizacion_id) }}" id="urbanizacion_id" placeholder="Urbanizacion Id">
            {!! $errors->first('urbanizacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="urbanizaci" class="form-label">{{ __('Urbanizaci') }}</label>
            <input type="text" name="urbanizaci" class="form-control @error('urbanizaci') is-invalid @enderror" value="{{ old('urbanizaci', $predio?->urbanizaci) }}" id="urbanizaci" placeholder="Urbanizaci">
            {!! $errors->first('urbanizaci', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombrevia" class="form-label">{{ __('Nombrevia') }}</label>
            <input type="text" name="nombrevia" class="form-control @error('nombrevia') is-invalid @enderror" value="{{ old('nombrevia', $predio?->nombrevia) }}" id="nombrevia" placeholder="Nombrevia">
            {!! $errors->first('nombrevia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>