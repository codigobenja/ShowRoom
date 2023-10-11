<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    use HasFactory;

    protected $fillable=[
       'usuario',
       'accion',
       'published_at',
     ];

    protected $dates=[
      'published_at'
    ];
}
