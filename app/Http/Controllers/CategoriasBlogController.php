<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPost;
use Illuminate\Support\Facades\Response;

//use DB;
use Illuminate\Support\Facades\DB;

class CategoriasBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->only('publicar');
    }
    public function index(){
    	
    	return view('admin.categorias.categoria_blog')->with('categorias', $categoria = CategoriaPost::all());
    	//dd(CategoriasProductos::all());
    	
    } 
    public function categoriasPadres($id){
        //$categoria_padre = CategoriasProductos::all();
        $categoria_padre = DB::table('categoria_post')->where('id_categoria_padre', $id)->get();
        return $categoria_padre;

        //dd($categoria_padre);
        
    }
    public function save(Request $request){
        //dd($request->all());
        $categorias_post = new CategoriaPost;
        $categorias_post->descripcion = $request->descripcion;
        $categorias_post->estado = $request->estado;
        $categorias_post->id_categoria_padre = $request->id_categoria_padre;

        $categorias_post->save();
        return ['categoria' => $categorias_post];
        return view('admin.categorias.categoria')->with('categorias', $categoria = CategoriaPost::all());
        
        //return Response::json($categorias_post);
    }

}
