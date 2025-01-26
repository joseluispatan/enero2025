<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $fillable = ['id','ubicacion', 'coeficiente'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
