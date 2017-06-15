<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasProductos;
use Illuminate\Support\Facades\Response;

//use DB;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->only('publicar');
    }
    public function index(){
    	

    	return view('admin.categorias.categoria')->with('categorias', $categoria = CategoriasProductos::where('id_categoria_padre', 0)->get() );
    	//dd(CategoriasProductos::all());
    	
    } 
    public function categoriasPadres($id){
        //$categoria_padre = CategoriasProductos::all();
        $categoria_padre = DB::table('categoria_producto')->where('id_categoria_padre', $id)->get();
        return $categoria_padre;

        //dd($categoria_padre);
        
    }
    public function save(Request $request){
        //dd($request->all());
        $categorias_productos = new CategoriasProductos;
        $categorias_productos->descripcion = $request->descripcion;
        $categorias_productos->estado = $request->estado;
        $categorias_productos->id_categoria_padre = $request->id_categoria_padre;

        $categorias_productos->save();
        return ['categoria' => $categorias_productos];
        return view('admin.categorias.categoria')->with('categorias', $categoria = CategoriasProductos::all());
        
        //return Response::json($categorias_productos);
    }


/*    public function guardar(Request $request){
    	$categoria = new CategoriasProductos;

        $categoria ->id_categoria_producto = $request->input('id_categoria_producto');
        $categoria ->titulo = $request->input('titulo');
        $categoria ->descripcion = $request->input('descripcion');
        $categoria ->cantidad = $request->input('cantidad');
        $categoria ->precio_venta =$request->input('precio_venta');
        $categoria ->estado = $request->input('estado');

    	dd($producto);
    }*/
}
