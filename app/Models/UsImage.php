<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class UsImage extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'service_id',
      'url',
      'extracto',
   ];

   protected static function boot(){
   //eliminacion fisica de una imagen
   parent::boot();
   static::deleting(function ($usimage){
     $photoPath =  str_replace('storage','public',$usimage->url);
     Storage::delete($photoPath);
     });
   }

   public function us(){
     return $this->belongsTo(Us::class);
  }
}
