<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Topografico
 *
 * @property $id
 * @property $topografico
 * @property $coeficiente
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Topografico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['topografico', 'coeficiente'];


}
