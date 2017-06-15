<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDireccion extends Model
{
    protected $table = 'cliente_direccion_envio';
    
    protected $fillable = ['id_cliente','nombre_contacto','pais','direccion1',
    	'direccion2','ciudad','estado','codigo_postal','telefono','principal','payu_info'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id');
    }
}
