<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'service_id',
      'url',
   ];

   protected static function boot(){
   //eliminacion fisica de una imagen
   parent::boot();
   static::deleting(function ($serviceimage){
     $photoPath =  str_replace('storage','public',$serviceimage->url);
     Storage::delete($photoPath);
     });
   }

   public function services(){
     return $this->belongsTo(Service::class);
  }
}
