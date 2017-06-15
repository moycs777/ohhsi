<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoriaPost;
use App\CategoriasProductos;
use App\Post;
use App\multimedia;
use App\post_galeria;
use App\ProductoVenta;
use App\Cliente;
use App\Calificacion;
use App\ClienteDireccion;
use Illuminate\Support\Facades\Response;

//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Redirect;
use Session;

class SearchController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    
    public function verPost($slug)
    {
        $post = DB::table('post')
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->join('post_galeria', 'post_galeria.id_post', '=' , 'post.id' )
            ->join('multimedia', 'multimedia.id' , '=' , 'post_galeria.id_multimedia' )
            ->select('post.descripcion', 'post.id' , 'post.titulo' , 
                'post.slug' , 'multimedia.ruta' )
            ->first();
            
        //dd($post);
        $imagenes = DB::select('select a.id_post,b.ruta,
                (select c.titulo from post c where c.id = a.id_post limit 1)
                from post_galeria a,multimedia b 
                where a.id_multimedia = b.id 
                and a.id_post = ' . $post->id  );
        
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        return view('pages.post.blog')
            ->with('post', $post)
            >with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat)
            ->with('imagenes', $imagenes);
    }

    public function busqueda( Request $request ){
        $categoriasAll = CategoriasProductos::all();
        $buscar = \Request::get('buscar');
        //	dd($buscar);
        $alerta = false;
        $calificacion = 0;
        $productos = ProductoVenta::where('titulo','like','%'.$buscar.'%')->orderBy('id')->paginate(10);
        if ($productos->isEmpty()) {
            $alerta = true;
        }
    	foreach ($productos as $producto) {
            //print_r($producto->id);
            $producto->imagen = DB::select('select a.id_producto_venta, b.ruta,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1 )
                from producto_venta_galeria a, multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $producto->id  );
            $productos_calificacion = DB::select('select coalesce(round( avg(estrellas),0)) promedio from calificacion where id_producto_venta = '  . $producto->id );
            $producto->calificacion = intval($productos_calificacion[0]->promedio);  
        }
        //dd($productos);
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
	    return view ('pages.resultado')
            ->with('alerta', $alerta)
            ->with('categoriasAll',$categoriasAll)
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat', $sub_cat)
            ->with('productos', $productos);	              
        
    }

    public function categories($slug)
    {
    	//dd($slug);
        $categoriasAll = CategoriasProductos::all();
        $categorias = array();
        $categoria_1 = CategoriasProductos::findBySlug($slug);
        //print_r($categoria_1->descripcion);
        $categoria_2 = CategoriasProductos::
            where('id', $categoria_1->id_categoria_padre)->first();
        //print_r(' ' .$categoria_2->descripcion);
        $categorias[0] =  $categoria_1;
        $categorias[1] =  $categoria_2;
        $id_1 = $categorias[0]->id;
        $id_2 = $categorias[1]->id;
        //dd($categorias[0]->id);  
        
       /* $resultado = DB::select('select * from producto_venta where id_categoria_producto ='. $id_1)
                ;*/
        $productos = DB::table('producto_venta')
                    ->where('id_categoria_producto',  $id_1)
                    ->orWhere('id_categoria_producto', $id_1)
                    ->paginate(10);
        $alerta = false;
        if ($productos->isEmpty()) {
            $alerta = true;
        }

        foreach ($productos as $producto) {
            //print_r($producto->id);
            $producto->imagen = DB::select('select a.id_producto_venta, b.ruta,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1 )
                from producto_venta_galeria a, multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $producto->id  );
            $productos_calificacion = DB::select('select coalesce(round( avg(estrellas),0)) promedio from calificacion where id_producto_venta = '  . $producto->id );
            $producto->calificacion = intval($productos_calificacion[0]->promedio);  
        }
        //dd($productos);
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        return view ('pages.resultado')
                ->with('categorias_index',$categorias_index)
                ->with('categoriasAll',$categoriasAll)
                ->with('sub_cat',$sub_cat)
                ->with('alerta', $alerta)
                ->with('productos', $productos);
        //dd($resultado);
    }
}


