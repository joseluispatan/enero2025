<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revinterno extends Model
{
    protected $fillable = ['revinterno', 'coeficiente'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
