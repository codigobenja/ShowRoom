<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    //proteccion de datos
    protected $fillable=[
       'id',
       'email',
       'nombre',
       'ap_paterno',
       'ap_materno',
       'asunto',
       'descripcion',
       'estatus',
    ];

    protected $dates = [
      'deleted_at'
    ];
}
