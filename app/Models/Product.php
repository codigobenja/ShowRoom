<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    //proteccion de datos
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'cantidad',
        'categoria',
        'published_at',
    ];

    protected $dates = [
      'published_at',
      'deleted_at'
    ];

    //FUNCIONES
    public function productimage(){
      //relacion con el modelo
      return $this->hasMany(ProductImage::class,'products_id');
    }

    public function category(){
      //relacion con el modelo
        return $this->belongsTo(ProductCategory::class,'categoria');
    }

//FALTA RELACION CON UN MODELO DE PRECIOS Y UNO DE DESCUENTOS

    protected static function boot(){
      //eliminacion fisica de una imagen
        parent::boot();
        static::deleting(function ($products){

            $products->productimage->each->delete();
            Storage::deleteDirectory('public/Products/'.$productimage->url.' '.$products->id);
        });
    }

    public function isPublished(){
      //relacion con el modelo
        return ! is_null($this->published_at) && $this->published_at <= today();
    }
}
