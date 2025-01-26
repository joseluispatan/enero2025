<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forma extends Model
{
    protected $fillable = ['id','forma', 'coeficiente'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
