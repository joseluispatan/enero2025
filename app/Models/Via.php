<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    protected $fillable = ['id','nombre', 'ancho', 'revestimiento_id'];
    
    public function predios()
    {
        return $this->hasMany(Predio::class);
    }
    public function revestimiento()
    {
        return $this->belongsTo(Revestimiento::class);
    }

}
