<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    protected $fillable = ['id','tipodocumento'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
