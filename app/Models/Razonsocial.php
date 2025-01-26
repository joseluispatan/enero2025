<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Razonsocial extends Model
{
    protected $fillable = ['id','razonsocial'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
