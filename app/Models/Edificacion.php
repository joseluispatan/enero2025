<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificacion extends Model
{
    protected $fillable = [
        'id',
        'piso', 
        'bloque',
        'kk1',
        'cimiento_id',
        'estructura_id',
        'muro_id',
        'revexterno_id',
        'cubierta_id',
        'revinterno_id',
        'acabado_id',
        'carpinteria_id',
        'destino_id'
];
//Relacion uno a muchos
    public function cimiento()
    {
        return $this->belongsTo(Cimiento::class);
    }
    public function estructura()
    {
        return $this->belongsTo(Estructura::class);
    }
    public function muro()
    {
        return $this->belongsTo(Muro::class);
    }
    public function revexterno()
    {
        return $this->belongsTo(Revexterno::class);
    }
    public function cubierta()
    {
        return $this->belongsTo(Cubierta::class);
    }
    public function revinterno()
    {
        return $this->belongsTo(Revinterno::class);
    }
    public function acabado()
    {
        return $this->belongsTo(Acabado::class);
    }
    public function carpinteria()
    {
        return $this->belongsTo(Carpinteria::class);
    }
    public function destino()
    {
        return $this->belongsTo(Destino::class);
    }
}
