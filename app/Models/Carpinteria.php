<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpinteria extends Model
{
    protected $fillable = ['carpinteria', 'coeficiente'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
