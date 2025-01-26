<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cubierta extends Model
{
    protected $fillable = ['cubierta', 'coeficiente'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
