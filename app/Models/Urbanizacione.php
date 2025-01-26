<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urbanizacione extends Model
{
    protected $fillable = ['id','urbanizaci'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
}
