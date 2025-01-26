<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acabado extends Model
{
    protected $fillable = ['acabado', 'coeficiente'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
