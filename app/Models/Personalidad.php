<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personalidad extends Model
{
    protected $fillable = ['id','personalidad'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
