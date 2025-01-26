@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Predio

@endsection

@section('plugins.Select2', true)
<style>
    .centrar {
        margin: 0 auto;
        /* Centra horizontalmente */
        width: fit-content;
        /* Ajusta el ancho al contenido */
    }
    .form-check {
        display: flex;
        align-items: center;
        /* Centra verticalmente el checkbox y el label */
        justify-content: space-between;
        /* Separa el checkbox y el label */
        margin-bottom: 10px;
        /* Espaciado entre checkboxes */
    }
    .form-check-input {
        margin-right: 10px;
        /* Espaciado entre el checkbox y el label */
    }
</style>
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar predio</span>
                    </div>
                    <div class="card-body light">
                        <form method="POST" action="{{ route('predios.update', $predio->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="centrar">
                                <ul class="nav nav-tabs pestania">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#primer">DATOS TITULAR / RAZÓN
                                            SOCIAL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#segundo">DATOS DEL INMUEBLE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tercero">COLINDANCIAS / FRENTE Y
                                            FONDO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#cuarto">SERVICIOS</a>
                                    </li>
                                </ul>
                            </div>
                            <br>

                            <div class="tab-content">
                                <!-- PRIMER TAB -->
                                <div class="tab-pane active" id="primer" role="tabpanel" aria-labelledby="primer-tab">
                                    <!-- PRIMERAS TRES FILAS -->
                                    <div class="container text-left">
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <!-- PRIMERA FILA -->
                                                <div class="col">
                                                    <!-- SELECCION SIMPLE POR PERSONALIDAD -->
                                                    <label for="personalidad_id" class="form-label">PERSONALIDAD:</label>
                                                    <select class="form-control" name="personalidad_id"
                                                        id="personalidad_id">
                                                        @foreach ($personalidads as $personalidad)
                                                            <option @selected(old('personalidad_id', $predio->personalidad_id) == $personalidad->id)
                                                                value="{{ $personalidad->id }}">
                                                                {{ $personalidad->personalidad }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- SELECCION MULTIPLE POR CEDULA DE IDENTIDAD -->
                                                <div class="col">
                                                    <label class="form-label" for="personas">SELECCIÓN POR CÉDULA DE
                                                        IDENTIDAD:</label>
                                                    <select class="form-control" name="personas[]" id="personas" multiple>
                                                        @foreach ($personas as $persona)
                                                            <option value="{{ $persona->id }}"
                                                                @if ($predio->personas->contains($persona)) selected @endif>
                                                                {{ $persona->ci }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- SELECCION SIMPLE EMPRESA -->
                                                <div class="col" id="empresa-container" style="display: none;">

                                                    <label for="empresa_id" class="form-label">NOMBRE DE LA EMPRESA</label>
                                                    <select class="form-control" name="empresa_id" id="empresa_id">
                                                        @foreach ($empresas as $empresa)
                                                            <option @selected(old('empresa_id', $predio->empresa_id) == $empresa->id)
                                                                value="{{ $empresa->id }}">
                                                                {{ $empresa->empresa }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- SEGUNDA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- SELECCION SIMPLE POR RAZON SOCIAL -->
                                                    <label for="razonsocial_id" class="form-label">RAZÓN SOCIAL</label>
                                                    <select class="form-control" name="razonsocial_id" id="razonsocial_id">
                                                        @foreach ($razonsocials as $razonsocial)
                                                            <option @selected(old('razonsocial_id', $predio->razonsocial_id) == $razonsocial->id)
                                                                value="{{ $razonsocial->id }}">
                                                                {{ $razonsocial->razonsocial }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- SELECCION SIMPLE POR TITULARIDAD -->
                                                <div class="col">
                                                    <label class="form-label" for="personas">TITULARIDAD:</label>
                                                    <select class="form-control" name="titularidad_id" id="titularidad_id">
                                                        @foreach ($titularidads as $titularidad)
                                                            <option @selected(old('titularidad_id', $predio->titularidad_id) == $titularidad->id)
                                                                value="{{ $titularidad->id }}">
                                                                {{ $titularidad->titularidad }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- TERCERA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- SELECCION TIPO DE DOCUMENTO DE PROPIEDAD -->
                                                    <label for="docpropiedad_id" class="form-label">DOCUMENTO DE
                                                        PROPIEDAD</label>
                                                    <select class="form-control" name="docpropiedad_id"
                                                        id="docpropiedad_id">
                                                        @foreach ($docpropiedads as $docpropiedad)
                                                            <option @selected(old('docpropiedad_id', $predio->docpropiedad_id) == $docpropiedad->id)
                                                                value="{{ $docpropiedad->id }}">
                                                                {{ $docpropiedad->docpropiedad }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- NÚMERO DE DOCUMENTO DE PROPIEDAD -->
                                                <div class="col">
                                                    <label class="form-label" for="personas">NÚMERO DE DOCUMENTO:</label>
                                                    <input type="text" name="numpropiedad"
                                                        class="form-control @error('numpropiedad') is-invalid @enderror"
                                                        value="{{ old('numpropiedad', $predio?->numpropiedad) }}"
                                                        id="numpropiedad" placeholder="Ejemplo. NS-125S-55" required>
                                                </div>
                                                <div class="col">
                                                    <!-- SELECCION MODO DE ADQUISISCIÓN -->
                                                    <label for="adquisicion_id" class="form-label">MODO DE
                                                        ADQUISISCIÓN:</label>
                                                    <select class="form-control" name="adquisicion_id" id="adquisicion_id">
                                                        @foreach ($adquisicions as $adquisicion)
                                                            <option @selected(old('adquisicion_id', $predio->adquisicion_id) == $adquisicion->id)
                                                                value="{{ $adquisicion->id }}">
                                                                {{ $adquisicion->adquisicion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div style="display: flex;">
                                            <button class="btn btn-outline-info siguiente" style="margin-left: auto;" data-target="#segundo">
                                                <i class="fas fa-arrow-right"></i> Siguiente
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- SEGUNDO TAB -->
                                <div class="tab-pane" id="segundo" role="tabpanel" aria-labelledby="segundo-tab">
                                    <div class="container text-left">
                                        <!-- PRIMERA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- SELECCION SIMPLE POR RAZON SOCIAL -->
                                                    <div class="col">
                                                        <label class="form-label" for="predios">NÚMERO DE PREDIO:</label>
                                                        <input type="text" name="numero"
                                                            class="form-control @error('numero') is-invalid @enderror"
                                                            value="{{ old('numero', $predio?->numero) }}" id="numero"
                                                            placeholder="Ejemplo. 10" required>
                                                    </div>
                                                </div>
                                                <!-- SELECCION SIMPLE POR VIA -->
                                                <div class="col">
                                                    <label class="form-label" for="predios">NOMBRE DE VÍA:</label>
                                                    <select class="form-control" name="via_id" id="via_id">
                                                        @foreach ($vias as $via)
                                                            <option @selected(old('via_id', $predio->via_id) == $via->id)
                                                                value="{{ $via->id }}">
                                                                {{ $via->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- SEGUNDA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- SELECCION REVESTIMIENTO DE LA VIA -->
                                                    <label for="revestimiento_id" class="form-label">REVESTIMIENTO DE LA
                                                        VÍA</label>
                                                    <select class="form-control" name="revestimiento_id">
                                                        @foreach ($revestimientos as $revestimiento)
                                                            @if ($revestimiento->zhs_id == $predio->zh_id)
                                                                <option @selected(old('revestimiento_id', $predio->revestimiento_id) == $revestimiento->id)
                                                                    value="{{ $revestimiento->id }}">
                                                                    {{ $revestimiento->revestimiento }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- UBICACION DEL PREDIO -->
                                                <div class="col">
                                                    <label for="ubicacion_id" class="form-label">UBICACIÓN DEL
                                                        PREDIO:</label>
                                                    <select class="form-control" name="ubicacion_id" id="ubicacion_id">
                                                        @foreach ($ubicacions as $ubicacion)
                                                            <option @selected(old('ubicacion_id', $predio->ubicacion_id) == $ubicacion->id)
                                                                value="{{ $ubicacion->id }}">
                                                                {{ $ubicacion->ubicacion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- TERCERA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- SELECCION FORMA -->
                                                    <label for="forma_id" class="form-label">FORMA:</label>
                                                    <select class="form-control" name="forma_id" id="forma_id">
                                                        @foreach ($formas as $forma)
                                                            <option @selected(old('forma_id', $predio->forma_id) == $forma->id)
                                                                value="{{ $forma->id }}">
                                                                {{ $forma->forma }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- SELECION DE TOPOGRAFIA -->
                                                <div class="col">
                                                    <label for="topografico_id" class="form-label">TOPOGRAFÍA:</label>
                                                    <select class="form-control" name="topografico_id"
                                                        id="topografico_id">
                                                        @foreach ($topograficos as $topografico)
                                                            <option @selected(old('topografico_id', $predio->topografico_id) == $topografico->id)
                                                                value="{{ $topografico->id }}">
                                                                {{ $topografico->topografico }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="display: flex;">
                                            <button class="btn btn-outline-info siguiente" style="margin-left: auto;" data-target="#tercero">
                                                <i class="fas fa-arrow-right"></i> Siguiente
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- TERCER TAB -->
                                <div class="tab-pane" id="tercero" role="tabpanel" aria-labelledby="tercero-tab">
                                    <div class="container text-left">
                                        <!-- PRIMERA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label" for="predios">ESTE:</label>
                                                    <input type="text" name="este"
                                                        class="form-control @error('este') is-invalid @enderror"
                                                        value="{{ old('este', $predio?->este) }}" id="este"
                                                        placeholder="Ejemplo. PREDIO N° 12" required>
                                                </div>
                                                <!-- OESTE -->
                                                <div class="col">
                                                    <label class="form-label" for="predios">OESTE:</label>
                                                    <input type="text" name="oeste"
                                                        class="form-control @error('oeste') is-invalid @enderror"
                                                        value="{{ old('oeste', $predio?->oeste) }}" id="oeste"
                                                        placeholder="Ejemplo. AVENIDA JUAN PABLO" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- SEGUNDA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label" for="predios">NORTE:</label>
                                                    <input type="text" name="norte"
                                                        class="form-control @error('norte') is-invalid @enderror"
                                                        value="{{ old('norte', $predio?->norte) }}" id="norte"
                                                        placeholder="Ejemplo. PREDIO N° 14" required>
                                                </div>
                                                <!-- SUR -->
                                                <div class="col">
                                                    <label class="form-label" for="predios">SUR:</label>
                                                    <input type="text" name="sur"
                                                        class="form-control @error('sur') is-invalid @enderror"
                                                        value="{{ old('sur', $predio?->sur) }}" id="sur"
                                                        placeholder="Ejemplo. PREDIO N° 09" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- TERCERA FILA -->
                                        <div class="p-2 bg-light border">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label" for="predios">FRENTE:</label>
                                                    <input type="text" name="frente"
                                                        class="form-control @error('frente') is-invalid @enderror"
                                                        value="{{ old('frente', $predio?->frente) }}" id="frente"
                                                        placeholder="Ejemplo. 10.25" required>
                                                </div>
                                                <!-- SUR -->
                                                <div class="col">
                                                    <label class="form-label" for="predios">FONDO:</label>
                                                    <input type="text" name="fondo"
                                                        class="form-control @error('fondo') is-invalid @enderror"
                                                        value="{{ old('fondo', $predio?->fondo) }}" id="fondo"
                                                        placeholder="Ejemplo. 15.21" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <button class="btn btn-outline-info siguiente" style="margin-left: auto;" data-target="#cuarto">
                                                <i class="fas fa-arrow-right"></i> Siguiente
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- CUARTO TAB -->
                                <div class="tab-pane" id="cuarto" role="tabpanel" aria-labelledby="cuarto-tab">

                                    <div class="d-flex justify-content-center align-items-center vh-10">
                                        <div >
                                            @foreach ($servicios as $servicio)
                                                <div class="p-2 bg-light border" class="form-check form-switch">
                                                    <input class="p-2 bg-light border" id="switch-{{ $servicio->id }}" class="form-check-input"
                                                        type="checkbox" name="servicios[]" value="{{ $servicio->id }}"
                                                        {{ $predio->servicios->contains($servicio->id) ? 'checked' : '' }}
                                                        role="switch">
                                                    <label  class="form-check-label" for="switch-{{ $servicio->id }}">
                                                        {{ $servicio->servicio }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>

                                    <div class="d-flex justify-content-center align-items-center vh-10">
                                        <div class="col-auto" class="d-flex justify-content-center align-items-center vh-10">
                                            <a href="{{ route('predios.index') }}" :active="request() - > routeIs('predios')">
                                                <button type="button" class="btn btn-outline-danger">
                                                    <i class="fas fa-times"></i>
                                                    CANCELAR
                                                </button>
                                            </a>
                                            
                                            <button type="submit" class="btn btn-outline-success" onclick="showConfirmation()">
                                                <i class="fas fa-check"></i>
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".pestania a").on('click', function(evt) {
                evt.preventDefault();
                $(this).tab("show");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#personas').select2({
                placeholder: "Seleccionar personas", // Placeholder que se puede personalizar
                allowClear: true // Permite limpiar la selección
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const personalidadSelect = document.getElementById('personalidad_id');
            const empresaContainer = document.getElementById('empresa-container');
            // Función para mostrar u ocultar el select de empresa
            function toggleEmpresaSelect() {
                if (personalidadSelect.value == 2) {
                    empresaContainer.style.display = 'block'; // Muestra el select
                } else {
                    empresaContainer.style.display = 'none'; // Oculta el select
                }
            }
            // Verifica el valor por defecto al cargar la página
            toggleEmpresaSelect();
            // Agrega el evento change para escuchar los cambios
            personalidadSelect.addEventListener('change', toggleEmpresaSelect);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.siguiente').on('click', function(e) {
                e.preventDefault(); // Evitar la acción por defecto
                 // Obtener el ID del tab que queremos activar
                var targetTab = $(this).data('target');
                var valid = true; // Variable para verificar si todos los campos son válidos
                    // Validar inputs obligatorios en el tab actual
                $('.tab-pane.active').find('input[required]').each(function() {
                    if ($(this).val() === '') { // Si el campo está vacío
                        valid = false;
                        $(this).addClass('is-invalid'); // Agrega clase de error
                    } else {
                        $(this).removeClass('is-invalid'); // Elimina clase de error si está lleno
                    }
                });
                    // Si todos los campos son válidos, cambiar el tab
                if (valid) {
                    // Cambiar el tab activo
                    $('.tab-pane.active').removeClass('active'); // Eliminar la clase 'active' del tab actual
                    $(targetTab).addClass('active'); // Agregar la clase 'active' al tab objetivo
    
                    // Cambiar la clase 'active' del botón de tab en la navegación
                    $('a[href="' + targetTab + '"]').tab('show'); // Mostrar el tab correspondiente
                } else {
                    // Mostrar mensaje de error con SweetAlert2
                    Swal.fire({
                        icon: 'warning', // Tipo de alerta
                        title: '¡Atención!',
                        text: 'Por favor completa todos los campos obligatorios.', // Mensaje de advertencia
                        confirmButtonText: 'Entendido' // Texto del botón de confirmación
                    });
                }
            });
        });
    </script>
    <script>
        function showConfirmation() {
            Swal.fire({
                title: '¿Estás seguro de que deseas guardar los cambios?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editForm').submit();
                }
            });
        }
    </script>

@stop
