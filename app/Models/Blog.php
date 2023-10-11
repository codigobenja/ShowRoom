<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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
       static::deleting(function ($blogss){

           $blogss->blogsimage->each->delete();
           Storage::deleteDirectory('public/Blogs/'.$blogss->url.' '.$blogss->id);
       });
   }

   public function blogsimage(){
     //relacion con el modelo
     return $this->hasMany(BlogImage::class,'blog_id');
   }

   public function category(){
     //relacion con el modelo
       return $this->belongsTo(BlogCategory::class,'categoria');
   }
   public function isPublished(){
     //relacion con el modelo
       return ! is_null($this->published_at) && $this->published_at <= today();
   }
}
