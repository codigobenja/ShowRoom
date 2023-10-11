<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;
    //proteccion de datos
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'categoria',
        'published_at',
    ];

    protected $dates = [
      'published_at',
      'deleted_at'
    ];

    //FUNCIONES
    public function inventoryimage(){
      //relacion con el modelo
      return $this->hasMany(InventoryImage::class,'inventory_id');
    }

    public function category(){
      //relacion con el modelo
        return $this->belongsTo(InventoryCategory::class,'categoria');
    }

    protected static function boot(){
      //eliminacion fisica de una imagen
        parent::boot();
        static::deleting(function ($inventories){

            $inventories->inventoryimage->each->delete();
            Storage::deleteDirectory('public/Inventories/'.$inventories->url.' '.$inventories->id);
        });
    }

    public function isPublished(){
      //relacion con el modelo
        return ! is_null($this->published_at) && $this->published_at <= today();
    }
}
