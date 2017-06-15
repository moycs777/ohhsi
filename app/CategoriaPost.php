<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPost extends Model
{
    protected $table = 'categoria_post';
     protected $fillable = [
        'descripcion', 'estado', 'id_categoria_padre'
    ];

}
