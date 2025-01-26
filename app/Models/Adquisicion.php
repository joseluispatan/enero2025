<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adquisicion extends Model
{
    protected $fillable = ['id','adquisicion'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
