<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Predio
 *
 * @property $id
 * @property $geom
 * @property $fid_
 * @property $entity
 * @property $numero
 * @property $codigo
 * @property $propietari
 * @property $ci
 * @property $manzana_id
 * @property $numpropiedad
 * @property $suptestimo
 * @property $supemedici
 * @property $supcedida
 * @property $suputil
 * @property $tros
 * @property $tc_x
 * @property $tc_y
 * @property $radio
 * @property $via_id
 * @property $topografico_id
 * @property $forma_id
 * @property $ubicacion_id
 * @property $servicio_id
 * @property $ff_id
 * @property $vz
 * @property $paterno
 * @property $materno
 * @property $nombre1
 * @property $nombre2
 * @property $tipodocumento_id
 * @property $personalidad_id
 * @property $razonsocial_id
 * @property $titularidad_id
 * @property $docpropiedad_id
 * @property $adquisicion_id
 * @property $equipamiento_id
 * @property $frente
 * @property $fondo
 * @property $observaciones
 * @property $revestimiento_id
 * @property $tc_ancho
 * @property $tc_alto
 * @property $norte
 * @property $sur
 * @property $este
 * @property $oeste
 * @property $area
 * @property $perimetro
 * @property $energia
 * @property $created_at
 * @property $updated_at
 * @property $zh_id
 * @property $distrito_id
 * @property $urbanizacion_id
 * @property $urbanizaci
 * @property $nombrevia
 *
 * @property PredioServicio[] $predioServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Predio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['propietari', 
                 'numero',
                 'ci',
                 'numpropiedad',
                 'suptestimonio',
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
                 'urbanizacione_id',
                 'energia',
                 'persona_id',
                 'empresa_id'
                ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function predioServicios()
    {
        return $this->hasMany(\App\Models\PredioServicio::class, 'id', 'predio_id');

    }
    public function personas()
    {
        return $this->belongsToMany(Persona::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function zh()
    {
        return $this->belongsTo(Zh::class);
    }
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
    public function manzana()
    {
        return $this->belongsTo(Manzana::class);
    }
    public function via()
    {
        return $this->belongsTo(Via::class);
    }
    public function urbanizacione()
    {
        return $this->belongsTo(Urbanizacione::class);
    }
    public function revestimiento()
    {
        return $this->belongsTo(Revestimiento::class);
    }
    public function topografico()
    {
        return $this->belongsTo(Topografico::class);
    }
    public function forma()
    {
        return $this->belongsTo(Forma::class);
    }
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    public function tipodocumento()
    {
        return $this->belongsTo(Tipodocumento::class);
    }
    public function personalidad()
    {
        return $this->belongsTo(Personalidad::class);
    }
    public function razonsocial()
    {
        return $this->belongsTo(Razonsocial::class);
    }
    public function titularidad()
    {
        return $this->belongsTo(Titularidad::class);
    }
    public function docpropiedad()
    {
        return $this->belongsTo(Docpropiedad::class);
    }
    public function adquisicion()
    {
        return $this->belongsTo(adquisicion::class);
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'predio_servicio');
    }

    
}
