<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CustomerAdress extends Model
{
    use HasFactory, SoftDeletes;
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
        'customer_id',
    ];

    protected $dates = [
      'deleted_at'
    ];

    //FUNCIONES
    public function customer(){
		//relacion con usuario
    return $this->belongsTo(Customer::class);
  	}
}
