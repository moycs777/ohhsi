<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasProductos;
use Illuminate\Support\Facades\Response;
//use DB;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
     public function index(){
    	
    	return view('admin.test')->with('categorias_productos', $categorias_productos = CategoriasProductos::all());
    		//dd(CategoriasProductos::all());
    	
    }

    public function save(Request $request){
    	//dd($request->all());
    	$categorias_productos = new CategoriasProductos;
    	$categorias_productos->descripcion = $request->descripcion;
    	$categorias_productos->estado = $request->estado;
    	$categorias_productos->id_categoria_padre = $request->id_categoria_padre;

    	$categorias_productos->save();
        return view('admin.test')->with('categorias_productos', $categorias_productos = CategoriasProductos::all());

        //return Response::json($categorias_productos);
    }
}
