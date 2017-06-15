<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CompraCliente;
use App\CompraClienteDetalle;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Response;
use Redirect;
use Session;

class DespachosController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->only('publicar');
    }

    public function index()
    {
    	/*select a.id_cliente, d.name || ' ' || d.lastname nombre, c.titulo, case when a.despacho = false then 'Sin despachar' else 'Despachado' end estatus, a.monto_compra from compras_clientes a,compras_clientes_detalle b, producto_venta c, clientes d 
	where a.id = id_compras_clientes and b.id_producto_venta = c.id and a.id_cliente = d.id*/
    	$ventas = DB::select('select a.id_cliente, d.name,d.lastname , c.titulo,
    	  a.despacho , a.monto_compra, a.fecha_compra, a.id
    			from compras_clientes a,compras_clientes_detalle b, producto_venta c, clientes d 
			where a.id = b.id_compras_clientes and b.id_producto_venta = c.id and a.id_cliente = d.id' );

    	
    	//dd($ventas);
    	
    	return view('admin.despachos.listado_despachos')->with('ventas', $ventas );
    }

    public function ver($id)
    {
        //dd($id);
    	$venta = DB::select('select  a.id_cliente, a.despacho , a.monto_compra, a.fecha_compra, b.cantidad, c.precio_venta, c.titulo,
    		d.name,d.lastname ,  
    	  	 e.*, g.ruta, a.id
    			from 
    				compras_clientes a,
    				compras_clientes_detalle b, 
    				producto_venta c, 
    				clientes d,
    				cliente_direccion_envio e,
    				producto_venta_galeria f,
    				multimedia g
				where 
                    a.id = '.$id.' and
					a.id = b.id_compras_clientes and 
					b.id_producto_venta = c.id and
					a.id_cliente = d.id and
					a.id_cliente = e.id_cliente and
					b.id_producto_venta = f.id_producto_venta and
					f.id_multimedia = g.id' );
    	

    	//dd($venta[0]);
    	return view('admin.despachos.ver')->with('venta', $venta );
    }

    public function despachar($id)
    {	
    	$venta = CompraCliente::find($id);
    	$venta->despacho = true;
    	$venta->fecha_despacho =  new \DateTime();
    	$venta->save();

    	return $this->index();
    }
}
