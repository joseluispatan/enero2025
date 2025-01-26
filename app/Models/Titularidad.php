<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titularidad extends Model
{
    protected $fillable = ['id','titularidad'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
