<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificacion';
    
    protected $fillable = ['id_compras_clientes','id_producto_venta','opinion',
    	'estrellas'];

    //relaciones

    public function compra_cliente()
    {
        return $this->belongsTo('App\CompraCliente', 'id_compras_clientes');
    }

    public function producto()
    {
        return $this->belongsTo('App\ProductoVenta', 'id_producto_venta');
    }
}
