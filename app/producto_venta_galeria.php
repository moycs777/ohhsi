<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto_venta_galeria extends Model
{
    //
    
    protected $table = 'producto_venta_galeria';
    
    protected $fillable = ['id_multimedia', 'id_producto_venta'];

   /* public function producto_venta()
    {
        return $this->belongsTo('App\ProductoVenta', 'producto_venta_id');
    }

    public function multimedia()
    {
        return $this->hasMany('App\multimedia', 'multimedia_id');
    }*/
}
