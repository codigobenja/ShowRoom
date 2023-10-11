<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'blog_id',
      'url',
   ];

   protected static function boot(){
   //eliminacion fisica de una imagen
   parent::boot();
   static::deleting(function ($blogimage){
     $photoPath =  str_replace('storage','public',$blogimage->url);
     Storage::delete($photoPath);
     });
   }

   public function blogs(){
     return $this->belongsTo(Blog::class);
  }
}
