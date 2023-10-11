<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactorySoftDeletes;
    //proteccion de datos
    protected $fillable = [
        'id',
        'calle',
        'numero_int',
        'numero_ext',
        'colonia',
        'municipio',
        'ciudad',
        'estado',
        'codigo_postal',
        'longitud',
        'latitud',
    ];

    protected $dates = [
      'deleted_at'
    ];
}
