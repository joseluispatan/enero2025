<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revestimiento extends Model
{
    protected $fillable = ['id','zona', 'revestimiento', 'valor', 'zhs_id'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
    public function vias()
    {
        return $this->hasMany(Via::class);
    }
}
