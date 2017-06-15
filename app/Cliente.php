<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $guard = 'cliente';

     protected $table = 'clientes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','email','password', 'provider', 'provider_id', 
    ];

   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function direccion_envio()
    {
        return $this->hasOne('App\ClienteDireccion', 'id_cliente');
    }

     public function compra_cliente()
    {
        return $this->hasMany('App\CompraCliente', 'id_cliente');
    }
}
