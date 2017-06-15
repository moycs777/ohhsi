<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraClienteDetalle extends Model
{
    protected $table = 'compras_clientes_detalle';
    
    protected $fillable = ['id_producto_venta','id_compras_clientes', 'cantidad','precio_unitario',
    ];

    //relaciones

    public function compra_cliente()
    {
        return $this->hasOne('App\CompraCliente');
    }

    public function producto()
    {
        return $this->belongsTo('App\ProductoVenta', 'id_producto_venta');
    }


}
