<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depresiacion extends Model
{
    protected $fillable = ['id','fecha_contruccion'];
    
    public function edificacions()
    {
        return $this->hasMany(Edificacion::class);
    }
}
