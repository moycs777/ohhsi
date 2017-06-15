<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class CategoriasProductos extends Model
{
	use Sluggable;	
    use SluggableScopeHelpers;

    protected $table = 'categoria_producto';
    protected $fillable = [
        'descripcion', 'estado', 'id_categoria_padre','slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'descripcion',
                'separator' => '-',
                'includeTrashed' => true
            ]
        ];
    }

    
}
