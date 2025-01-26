<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docpropiedad extends Model
{
    protected $fillable = ['id','docpropiedad'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
