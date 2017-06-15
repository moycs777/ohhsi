<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_galeria extends Model
{
    
    protected $table = 'post_galeria';
    
    protected $fillable = ['id_multimedia', 'id_post'];
}
