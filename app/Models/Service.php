<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
       'id',
       'nombre',
       'descripcion',
       'costo',
       'categoria',
    ];

    protected $dates=[
      'deleted_at'
  ];

  public function servicesimage(){
    //relacion con el modelo
    return $this->hasMany(ServiceImage::class,'service_id');
  }

  public function category(){
    //relacion con el modelo
      return $this->belongsTo(ServiceCategory::class,'categoria');
  }
}
