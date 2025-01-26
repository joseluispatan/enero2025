<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
 
    protected $fillable = ['paterno', 
                            'materno', 
                            'nombre', 
                            'tipodocumento_id',
                            'ci', 
                            'direccion'];

    public function tipodocumento()
    {
        return $this->belongsTo(Tipodocumento::class);
    }
    public function predios()
    {
        return $this->belongsToMany(Predio::class);
    }
    
    
}
