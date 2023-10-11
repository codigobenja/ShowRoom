<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class InventoryImage extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'inventory_id',
      'url',
   ];

   protected static function boot(){
   //eliminacion fisica de una imagen
   parent::boot();
   static::deleting(function ($inventoriesimage){
     $photoPath =  str_replace('storage','public',$inventoriesimage->url);
     Storage::delete($photoPath);
     });
   }

   public function inventories(){
     return $this->belongsTo(Inventory::class);
  }
}
