<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Predio extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'propietari',
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

    public function predioServicios(): HasMany
    {
        return $this->hasMany(PredioServicio::class, 'predio_id');
    }

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function zh(): BelongsTo
    {
        return $this->belongsTo(Zh::class);
    }

    public function distrito(): BelongsTo
    {
        return $this->belongsTo(Distrito::class);
    }

    public function manzana(): BelongsTo
    {
        return $this->belongsTo(Manzana::class);
    }

    public function via(): BelongsTo
    {
        return $this->belongsTo(Via::class);
    }

    public function urbanizacione(): BelongsTo
    {
        return $this->belongsTo(Urbanizacione::class);
    }

    public function revestimiento(): BelongsTo
    {
        return $this->belongsTo(Revestimiento::class);
    }

    public function topografico(): BelongsTo
    {
        return $this->belongsTo(Topografico::class);
    }

    public function forma(): BelongsTo
    {
        return $this->belongsTo(Forma::class);
    }

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class);
    }

    public function tipodocumento(): BelongsTo
    {
        return $this->belongsTo(Tipodocumento::class);
    }

    public function personalidad(): BelongsTo
    {
        return $this->belongsTo(Personalidad::class);
    }

    public function razonsocial(): BelongsTo
    {
        return $this->belongsTo(Razonsocial::class);
    }

    public function titularidad(): BelongsTo
    {
        return $this->belongsTo(Titularidad::class);
    }

    public function docpropiedad(): BelongsTo
    {
        return $this->belongsTo(Docpropiedad::class);
    }

    public function adquisicion(): BelongsTo
    {
        return $this->belongsTo(Adquisicion::class);
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'predio_servicio');
    }
}