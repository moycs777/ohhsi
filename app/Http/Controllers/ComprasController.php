<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CategoriaPost;
use App\Post;
use App\Cliente;
use App\multimedia;
use App\post_galeria;
use App\ProductoVenta;
use App\CompraCliente;
use App\CompraClienteDetalle;
use App\Calificacion;
use Illuminate\Support\Facades\Response;

//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Redirect;
use Session;
use Auth;

class ComprasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    
    public function ver($slug)
    {
        $producto = DB::table('producto_venta')
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->join('producto_venta_galeria', 'producto_venta_galeria.id_producto_venta', '=' , 'producto_venta.id' )
            ->join('multimedia', 'multimedia.id' , '=' , 'producto_venta_galeria.id_multimedia' )
            ->select('producto_venta.descripcion', 'producto_venta.id' , 'producto_venta.titulo' , 'producto_venta.precio_venta' , 'producto_venta.cantidad', 'producto_venta.slug' , 'producto_venta.id_categoria_producto', 'multimedia.ruta' )
            ->first();

        $imagenes = DB::select('select a.id_producto_venta,b.ruta,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1)
                from producto_venta_galeria a,multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $producto->id  );


        //dd($imagenes);


        /*$galerias = producto_venta_galeria::where('id_producto_venta', $producto->id)->get();


        $imagenes = array();
        foreach ($galerias as $galeria) {
              var_dump($galeria->id_multimedia);
              $imagenes = multimedia::where('id','=', $galeria->id_multimedia)

                ->get();
          }
          dd($imagenes->all());*/
        foreach ($imagenes as $imagen) {
             //print_r($imagen->ruta);
             substr($imagen->ruta, 8);

         } 
        //
        //dd($imagenes);

         //testimonio
         $testimonio = DB::table('calificacion')
                ->where('id_producto_venta', '=', $producto->id)
                ->take(3)
                ->get();
        $producto->testimonio = $testimonio;                
        
        //dd($producto->testimonio[0]->estrellas);
        $recomendaciones = DB::table('producto_venta')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        //dd($recomendaciones);
        foreach ($recomendaciones as $recom) {
            //print_r($recom->id);
            
            $recom->imagen = DB::select('select a.id_producto_venta, b.ruta,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1 )
                from producto_venta_galeria a, multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $recom->id  ); 

            $promedio = DB::select('select coalesce(round(avg(estrellas),0)) promedio from calificacion where id_producto_venta = '.$recom->id  );
                //dd($prod_restante->promedio[0]->promedio);
                if ($promedio[0]->promedio == null) {
                    $promedio[0]->promedio = 0;
                    $recom->promedio = $promedio[0]->promedio;
                }elseif($promedio[0]->promedio > 0){
                    $recom->promedio = intval($promedio[0]->promedio);

                } 
        }
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        
        //dd($producto->testimonio);
        return view('pages.producto')
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat)
            ->with('producto', $producto)
            ->with('recomendaciones', $recomendaciones)
            ->with('imagenes', $imagenes);

    }

    
    public function comprar(Request $request, $id){

        //validar si tiene direccion
        $direccion = DB::select('select * from cliente_direccion_envio
            where id_cliente = '.$id.'
            ');
        if ( empty($direccion) ) {
            $dir = 0;
            $cliente = Cliente::find($id);
            return view ('pages.perfil-grabar')->with('cliente', $cliente)->with('dir', $dir);
        }

        //return $request->all();
        $compra = new CompraCliente();
        $compra->monto_compra = ($request->precio) * ($request->cantidad);
        $compra->fecha_compra = new \DateTime();
        $compra->id_cliente = $id;
        $compra->despacho = false;
        $compra->save();

        $id_compras_clientes =  $compra->id;    
        
        $detalle = new CompraClienteDetalle();
        $detalle->id_producto_venta = $request->id_producto_venta;
        $detalle->id_compras_clientes = $id_compras_clientes;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio_unitario = $request->precio;
        $detalle->save();

        return view('pages.post-compra')->with('detalle', $detalle);

    }

     public function calificar(Request $request)
     {
        //dd($request->all());
        //dd( $request->compra[0]);
        $calificacion = new Calificacion();
        $calificacion->id_compras_clientes = intval($request->id_compras_clientes);
        $calificacion->id_producto_venta = intval($request->id_producto_venta);
        $calificacion->opinion = $request->testimonio;
        $calificacion->estrellas = intval($request->estrellas);
        $calificacion->save();
        //dd($calificacion);
        return redirect()->route('inicio');

     }
}
