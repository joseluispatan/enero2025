<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muro extends Model
{
    protected $fillable = ['muro', 'coeficiente'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
