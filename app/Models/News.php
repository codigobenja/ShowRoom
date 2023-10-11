<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
       'id',
       'titulo',
       'url',
       'extracto',
       'cuerpo',
       'destacado',
       'categoria',
       'published_at',
    ];

    protected $dates=[
      'published_at',
      'deleted_at'
  ];

  public function getRouteKeyName(){
       return 'url';
   }

   protected static function boot(){
     //eliminacion fisica de una imagen
       parent::boot();
       static::deleting(function ($newss){

           $newss->newsimage->each->delete();
           Storage::deleteDirectory('public/News/'.$newss->url.' '.$newss->id);
       });
   }

   public function newsimage(){
     //relacion con el modelo
     return $this->hasMany(NewsImage::class,'new_id');
   }

   public function category(){
     //relacion con el modelo
       return $this->belongsTo(NewsCategory::class,'categoria');
   }
   public function isPublished(){
     //relacion con el modelo
       return ! is_null($this->published_at) && $this->published_at <= today();
   }
}
