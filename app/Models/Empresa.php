<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['empresa', 'nit'];
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }

}
