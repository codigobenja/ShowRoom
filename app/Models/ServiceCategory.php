<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function getRouteKeyName(){
      return 'url';
    }

    public function services(){
      //relacion con el modelo news
    	return $this->hasMany(Service::class);
    }

    public function setNameAttribute($name){
        $this->attributes['nombre']=($name);
        $this->attributes['url']=str_slug($name);
    }
}
