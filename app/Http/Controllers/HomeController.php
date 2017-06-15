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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'home';
        $estilo_color = ['background: orange; color: white; margin-bottom: 2%; padding-bottom: 30px;',
                    'background: darkviolet; color: white; padding-left: 5%; margin-bottom: 2%; padding-bottom: 30px;',
                    'background: #e42a4d; color: white; padding-bottom: 30px;'];

        //$posts = Post::all();
        $posts = DB::table('post')
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
        foreach ($posts as $key => $post) {
            
            $post->imagen = DB::select('select a.id_post, b.ruta,
                (select c.titulo from post c where c.id = a.id_post limit 1 )
                from post_galeria a, multimedia b 
                where a.id_multimedia = b.id 
                and a.id_post = ' . $post->id  );     
            if (empty($post->imagen) ) {
                
                $post->imagen[0][0]->ruta='/public/images/batgirl.jpg';              
                //$post->imagen = ['ruta' => '/public/images/batgirl.jpg' ];              
            }          
        }
        //dd($posts);
        //dd($posts[1]->imagen[0]->ruta);
        
        $productos = DB::table('producto_venta')
                ->orderBy('id', 'desc')
                ->get();

        
        $productos_4 = $productos->take(4);
        //dd($productos_4);
        //dd(count($productos_4) );        
        $calificacion_4 = [];
        foreach ($productos_4 as $producto) {
            //print_r($producto->id);
            $producto->imagen = DB::select('select a.id_producto_venta, b.ruta,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1 )
                from producto_venta_galeria a, multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $producto->id  );  
        }

        $calificacion_4 = [0,0,0,0];
        
        if (count($productos) <=3) {
            $iterador = count($productos);
        }elseif(count($productos) >=4){
            $iterador = 3;

        }
        for ($i=0; $i < $iterador; $i++) { 
                $productos_calificacion = DB::select('select coalesce(round( avg(estrellas),0)) promedio from calificacion where id_producto_venta = '  . $productos_4[$i]->id );
                $calificacion_4[$i] = intval($productos_calificacion[0]->promedio);
                //dd($calificacion);
        }
        //dd($calificacion_4);

        if( empty($productos_calificacion) ){
            $calificacion_4 = [0,0,0,0];
        }        
        $calificacion_r = [];
        $productos_restantes = [];
        
        
        //Productos restantes ////////////////////////////////////////////
        $tamano = count($productos);
        //dd($tamano);
        if ($tamano >= 5) {
            //dd(count($productos));
            $promedio = 0;
            if ($tamano >= 5 && $tamano <= 8) {
                for ($i=0; $i <$tamano-4 ; $i++) { 
                   $productos_restantes[$i] = $productos[$i+4];
                   //dd($tamano); 
                }
            }elseif($tamano >8)  {
                for ($i=0; $i <4 ; $i++) { 
                   $productos_restantes[$i] = $productos[$i+4];
                }
            }
                
            foreach ($productos_restantes as $prod_restante) {
                //print_r($producto->id);
                $prod_restante->imagen = DB::select('select a.id_producto_venta, b.ruta,
                    (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1 )
                    from producto_venta_galeria a, multimedia b 
                    where a.id_multimedia = b.id 
                    and a.id_producto_venta = ' . $prod_restante->id  ); 

               
                $promedio = DB::select('select coalesce(round(avg(estrellas),0)) promedio from calificacion where id_producto_venta = '.$prod_restante->id  );
                    //dd($prod_restante->promedio[0]->promedio);
                    if ($promedio[0]->promedio == null) {
                        $promedio[0]->promedio = 0;
                        $prod_restante->promedio = $promedio[0]->promedio;
                    }elseif($promedio[0]->promedio > 0){
                        $prod_restante->promedio = intval($promedio[0]->promedio);

                    } 

                    //dd($promedio);

            }
            //dd($productos_restantes);
            //dd($productos_restantes[0]->promedio[0][0]);
            $calificacion_r = [];
        }elseif ($tamano<=4) {
            //dd(count($productos));
            $calificacion_r = [];
            $productos_restantes = [];
        }
        
        
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        
        
        //dd($sub_cat);

        return view('pages.blog')
            ->with('posts', $posts)
            ->with('estilo_color',$estilo_color)
            ->with('productos_4',$productos_4)
            ->with('calificacion_4', $calificacion_4)
            ->with('calificacion_r', $calificacion_r)
            ->with('productos_restantes',$productos_restantes)
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat)
            ;
            
    }

    public function perfil($id)
    {
        $cliente = Cliente::find($id);
        //dd($cliente->direccion_envio->nombre_contacto);
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        
        return view ('pages.perfil-ver')
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat)
            ->with('cliente', $cliente);
        //return Cliente::find($id);
    }

    public function verificar($id)
    {
        $cliente = Cliente::find($id);
        //dd($cliente->direccion_envio->nombre_contacto);
        $dir = false;
        $direccion = ClienteDireccion::where('id_cliente', $id)->first();
        //dd($direccion);
        if ($direccion==null) {
            //dd($direccion);
            $sub_cat = [];
            $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
            $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
            return view ('pages.perfil-nuevo')
                ->with('categorias_index',$categorias_index)
                ->with('sub_cat',$sub_cat)
                ->with('cliente', $cliente)
                ->with('dir', $dir);
            
        }
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        return view ('pages.perfil-grabar')->with('cliente', $cliente)
                ->with('categorias_index',$categorias_index)
                ->with('sub_cat',$sub_cat)    
                ->with('direccion', $direccion)
                ->with('dir', $dir);
        //dd($direccion);
    }

    public function perfil_grabar(Request $request, $id)
    {
        //$cliente = Cliente::find($id);

        //dd( $request->all());
        //dd( $cliente->direccion_envio->nombre_contacto);
        $direccion = ClienteDireccion::where('id_cliente', '=', $id)
            ->updateOrCreate(
                ['id_cliente' => $id], //what we look for
                ['nombre_contacto' => $request->nombre_contacto,
                    'pais' => $request->pais,
                    'direccion1' => $request->direccion1,
                    'direccion2' => $request->direccion2,
                    'ciudad' => $request->ciudad,
                    'estado' => $request->estado,
                    'codigo_postal' => $request->codigo_postal,
                    'telefono' => $request->telefono,
                    'payu_info' => $request->payu_info,
                    'principal' => true,
                ]//what to update
            );
        
        return redirect()->route('cliente.perfil.ver', ['id'=>$id]);
    }

    public function perfil_ver($id)
    {
        $direccion = ClienteDireccion::where('id_cliente', $id)
               ->first()
               ->get();
        return redirect()->route('inicio');
        dd($direccion);
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
        //dd($imagenes);    
        /*$galerias = producto_venta_galeria::where('id_producto_venta', $producto->id)->get();

        $imagenes = array();
        foreach ($galerias as $galeria) {
              var_dump($galeria->id_multimedia);
              $imagenes = multimedia::where('id','=', $galeria->id_multimedia)
                ->get();          }
          dd($imagenes->all());*/

          //eliminar public de la ruta
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');  
        return view('pages.post.blog')
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat)
            ->with('post', $post)
            ->with('imagenes', $imagenes);
    }

    public function busqueda(Request $request){
        $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        return view('pages.resultado')
            ->with('categorias_index',$categorias_index)
            ->with('sub_cat',$sub_cat);
        //dd($slug);
    }
    public function categorias(){
         $sub_cat = [];
        $categorias_index = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        //dd($categorias_index);

        
        $sub_cat = DB::select('select * from categoria_producto where id_categoria_padre != 0');
        return;
    }
}
