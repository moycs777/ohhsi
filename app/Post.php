<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use Sluggable;    
    use SluggableScopeHelpers;

    protected $table = 'post';
    protected $fillable = [
        'id_categoria_post','id_multimedia','titulo','slug','descripcion'

    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
}
