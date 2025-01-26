<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="geom" class="form-label">{{ __('Geom') }}</label>
            <input type="text" name="geom" class="form-control @error('geom') is-invalid @enderror" value="{{ old('geom', $edificacion?->geom) }}" id="geom" placeholder="Geom">
            {!! $errors->first('geom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fid_" class="form-label">{{ __('Fid ') }}</label>
            <input type="text" name="fid_" class="form-control @error('fid_') is-invalid @enderror" value="{{ old('fid_', $edificacion?->fid_) }}" id="fid_" placeholder="Fid ">
            {!! $errors->first('fid_', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="entity" class="form-label">{{ __('Entity') }}</label>
            <input type="text" name="entity" class="form-control @error('entity') is-invalid @enderror" value="{{ old('entity', $edificacion?->entity) }}" id="entity" placeholder="Entity">
            {!! $errors->first('entity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $edificacion?->codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="bloque" class="form-label">{{ __('Bloque') }}</label>
            <input type="text" name="bloque" class="form-control @error('bloque') is-invalid @enderror" value="{{ old('bloque', $edificacion?->bloque) }}" id="bloque" placeholder="Bloque">
            {!! $errors->first('bloque', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="piso" class="form-label">{{ __('Piso') }}</label>
            <input type="text" name="piso" class="form-control @error('piso') is-invalid @enderror" value="{{ old('piso', $edificacion?->piso) }}" id="piso" placeholder="Piso">
            {!! $errors->first('piso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="kk1" class="form-label">{{ __('Kk1') }}</label>
            <input type="text" name="kk1" class="form-control @error('kk1') is-invalid @enderror" value="{{ old('kk1', $edificacion?->kk1) }}" id="kk1" placeholder="Kk1">
            {!! $errors->first('kk1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_edificacion" class="form-label">{{ __('Fecha Edificacion') }}</label>
            <input type="text" name="fecha_edificacion" class="form-control @error('fecha_edificacion') is-invalid @enderror" value="{{ old('fecha_edificacion', $edificacion?->fecha_edificacion) }}" id="fecha_edificacion" placeholder="Fecha Edificacion">
            {!! $errors->first('fecha_edificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cimiento_id" class="form-label">{{ __('Cimiento Id') }}</label>
            <input type="text" name="cimiento_id" class="form-control @error('cimiento_id') is-invalid @enderror" value="{{ old('cimiento_id', $edificacion?->cimiento_id) }}" id="cimiento_id" placeholder="Cimiento Id">
            {!! $errors->first('cimiento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estructura_id" class="form-label">{{ __('Estructura Id') }}</label>
            <input type="text" name="estructura_id" class="form-control @error('estructura_id') is-invalid @enderror" value="{{ old('estructura_id', $edificacion?->estructura_id) }}" id="estructura_id" placeholder="Estructura Id">
            {!! $errors->first('estructura_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="muro_id" class="form-label">{{ __('Muro Id') }}</label>
            <input type="text" name="muro_id" class="form-control @error('muro_id') is-invalid @enderror" value="{{ old('muro_id', $edificacion?->muro_id) }}" id="muro_id" placeholder="Muro Id">
            {!! $errors->first('muro_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="revexterno_id" class="form-label">{{ __('Revexterno Id') }}</label>
            <input type="text" name="revexterno_id" class="form-control @error('revexterno_id') is-invalid @enderror" value="{{ old('revexterno_id', $edificacion?->revexterno_id) }}" id="revexterno_id" placeholder="Revexterno Id">
            {!! $errors->first('revexterno_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cubierta_id" class="form-label">{{ __('Cubierta Id') }}</label>
            <input type="text" name="cubierta_id" class="form-control @error('cubierta_id') is-invalid @enderror" value="{{ old('cubierta_id', $edificacion?->cubierta_id) }}" id="cubierta_id" placeholder="Cubierta Id">
            {!! $errors->first('cubierta_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="revinterno_id" class="form-label">{{ __('Revinterno Id') }}</label>
            <input type="text" name="revinterno_id" class="form-control @error('revinterno_id') is-invalid @enderror" value="{{ old('revinterno_id', $edificacion?->revinterno_id) }}" id="revinterno_id" placeholder="Revinterno Id">
            {!! $errors->first('revinterno_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="acabado_id" class="form-label">{{ __('Acabado Id') }}</label>
            <input type="text" name="acabado_id" class="form-control @error('acabado_id') is-invalid @enderror" value="{{ old('acabado_id', $edificacion?->acabado_id) }}" id="acabado_id" placeholder="Acabado Id">
            {!! $errors->first('acabado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="carpinteria_id" class="form-label">{{ __('Carpinteria Id') }}</label>
            <input type="text" name="carpinteria_id" class="form-control @error('carpinteria_id') is-invalid @enderror" value="{{ old('carpinteria_id', $edificacion?->carpinteria_id) }}" id="carpinteria_id" placeholder="Carpinteria Id">
            {!! $errors->first('carpinteria_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="destino_id" class="form-label">{{ __('Destino Id') }}</label>
            <input type="text" name="destino_id" class="form-control @error('destino_id') is-invalid @enderror" value="{{ old('destino_id', $edificacion?->destino_id) }}" id="destino_id" placeholder="Destino Id">
            {!! $errors->first('destino_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>