<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ProductoVenta extends Model
{
    use Sluggable;	
    use SluggableScopeHelpers;

    protected $table = 'producto_venta';
    protected $fillable = [
        'id_categoria_producto', 'titulo','slug','descripcion','cantidad','precio_venta','estado'
    ];

    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo',
                'separator' => '-',
                'includeTrashed' => true
            ]
        ];
    }
    protected $hidden = [];

    /*public function galerias()
    {
        return $this->hasMany('App\producto_venta_galeria', 'id_producto_venta');
    }*/

    /* public function imagenes_del_post()
    {
        return $this->hasManyThrough(
            'App\producto_venta_galeria', 'App\multimedia',
            'id_producto_venta', 'id_multimedia'
        );
    }*/
}
