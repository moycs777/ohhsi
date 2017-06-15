<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraCliente extends Model
{
    protected $table = 'compras_clientes';
    
    protected $fillable = ['monto_compra','fecha_compra','despacho',
    	'calificacion','soporte_pago','id_cliente'
    ];

    //relaciones

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    public function compras_clientes_detalles()
    {
        return $this->belongsTo('App\CompraClienteDetalle', 'id_compras_clientes');
    }

    


}
