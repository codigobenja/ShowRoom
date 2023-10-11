<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'new_id',
      'url',
   ];

   protected static function boot(){
   //eliminacion fisica de una imagen
   parent::boot();
   static::deleting(function ($newimage){
     $photoPath =  str_replace('storage','public',$newimage->url);
     Storage::delete($photoPath);
     });
   }

   public function news(){
     return $this->belongsTo(News::class);
  }
}
