<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    //proteccion de datos
    protected $fillable = [
        'id',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'sexo',
        'Genero',
        'fecha_nacimiento',
        'titulo',
        'puesto',
        'telefono',
        'celular',
        'rfc',
        'user_id',
    ];

    protected $dates = [
      'deleted_at'
    ];

    //FUNCIONES
    public function user(){
      return $this->belongsTo(User::class);
  	}
    public function adress(){
      return $this->hasMany(CustomerAdress::class);
    }
}
