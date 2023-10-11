<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory, SoftDeletes;
    //proteccion de datos
    protected $fillable=[
      'nombre',
      'icono',
      'url',
      'target',
    ];

    protected $dates = [
      'deleted_at'
    ];
}
