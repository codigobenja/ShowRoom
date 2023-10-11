<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Us extends Model
{
    use HasFactory;
    protected $fillable=[
       'descripcion',
       'mision',
       'vision',
       'valores',
    ];

    protected static function boot(){
      //eliminacion fisica de una imagen
        parent::boot();
        static::deleting(function ($uss){

            $uss->usimage->each->delete();
            Storage::deleteDirectory('public/Us/'.$usimage->url.' '.$uss->id);
        });
    }

    public function usimage(){
      //relacion con el modelo
      return $this->hasMany(UsImage::class,'us_id');
    }
}
