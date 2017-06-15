<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPost;
use App\Post;
use App\multimedia;
use App\post_galeria;
use App\ProductoVenta;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Redirect;
use Session;
use Image;
use DateTime;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->only('publicar');
    }

    public function index()
    {
        $posts = DB::table('post')->distinct('post.id', 'post.titulo', 'post_galeria.id_multimedia')
            ->join('post_galeria', 'post_galeria.id_post', '=' ,  'post.id' )
            ->select('post.id' , 'post.titulo' , 'post.descripcion' , 
                'post.slug', 'post_galeria.id_post')
            ->orderBy('post.id', 'asc')
            ->paginate(15);
        //dd($posts);
        foreach ($posts as $post) {
            //print_r('   id producto venta:   ');
            $post_id = $post->id_post;
            //print_r($id);
            $galeria = DB::table('post_galeria')
                ->when($post_id, function ($query) use ($post_id) {
                    return $query->where('id_post', $post_id);
                })

                ->select('post_galeria.id_multimedia')
                ->first();
            //dd($galeria);
            $post->id_multimedia = $galeria->id_multimedia;
            //print_r(($galeria->id_multimedia));
        }
        foreach ($posts as $post) {
            $ruta = multimedia::find($post->id_multimedia);
            //print_r($ruta->ruta);
            $post->ruta = $ruta->ruta;
        }

        return view('admin.post.listado_posts')->with('posts', $posts);
    }

    public function publicar()
    {
        //return "Publicador de productos";
        $categorias_padres = DB::table('categoria_post')->where('id_categoria_padre', 0)->get();
        return view('admin.post.crear_post')->with('categorias_padres', $categorias_padres);
    }

    public function guardar(Request $request)
    {
        $files = Input::file('file');
       
        $tipo_archivo = Input::file('file')->getMimeType();
        /* verifica si el directorio donde las imagenes se subiran esta creado */
        if(!file_exists(public_path() . '/images')){
            mkdir(public_path() . '/images',0755);
        }

        $destinationPath = public_path() . '/images'; // upload folder in public directory
        $now = new DateTime();
        $timestring = $now->format('s');
        $filename = $timestring . $files->getClientOriginalName();
        
        //Redimension con intervention
        if(!file_exists(public_path() . '/images/thumbs')){
            mkdir(public_path() . '/images/thumbs',0755);
        }
        $img = Image::make($files->getRealPath());
        $img->resize(320, 240);
        $img->save( public_path() . '/images/thumbs/'. $filename );
        //$img->save(public_path('thumbs'. $filename));

        if (!$files->move($destinationPath, $filename)) {
            return ['success' => false];
        }
        /* guardar en la tabla de multimedias, la cual es donde estan TODOS los archivos */
        $multimedia = new multimedia();
        $multimedia->ruta = '/public/images/' . $filename;
        $multimedia->tipo_archivo = $tipo_archivo;
        $multimedia->save();

        $response = [
            'success' => true,
            'images' => $multimedia->id
        ];


        return $response;
    }

    public function guardarForm(Request $request)
    {
        //dd($request->all()) ;
        if (empty($request->id_image) ) {
            return redirect('blog/publicar')
                        ->withErrors("Debes seleccionar 1 o mas imagenes")
                        ->withInput();
            //return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
        }
        $post = new Post();
        $post->id_categoria_post = $request->id_categoria_post;
        $post->titulo = $request->titulo;
        $post->descripcion =  $request->descripcion;
        //$post->slug = $request->titulo;
        //dd($request->all());
        $post->save();
        
        $id_post = $post->id;
        //dd($id_producto_venta);
        foreach ($request->id_image as $key => $value){
            //dd($request->all());
            $post_galeria = new post_galeria();
            $post_galeria->id_multimedia =  $request->id_image[$key];
            $post_galeria->id_post = $id_post;
            $post_galeria->save();
        }
        //dd($post);
        return redirect('blog');
    }

    public function imagenes(Request $request)
    {
        dd($request->all());
        return ['images' => $images];
    }

    public function catprodHijos($id)
    {
        //dd($id);
        //$categoria_padre = CategoriasProductos::all();
        $categoria_hijos = DB::table('categoria_post')->where('id_categoria_padre', $id)->get();
        return $categoria_hijos;
        //dd($categoria_padre);
    }
    public function catprodNietos($id)
    {
        //dd($id);
        $categoria_nieto = DB::table('categoria_post')->where('id_categoria_padre', $id)->get();
        return $categoria_nieto;
        //dd($categoria_padre);
    }
    public function ver($slug)
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
                  
        return view('pages.post.blog')
            ->with('post', $post)
            ->with('imagenes', $imagenes);
    }

    public function delete($slug)
    {
        //dd($slug);
        $post = DB::table('post')
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->join('post_galeria', 'post_galeria.id_post', '=' , 'post.id' )
            ->join('multimedia', 'multimedia.id' , '=' , 'post_galeria.id_multimedia' )
            ->select('post.descripcion', 'post.id' , 'post.titulo' , 'post.slug' , 'post.id_categoria_post', 'multimedia.ruta' )
            ->first();

        $imagenes = DB::select('select a.id_post,b.ruta, b.id,
                (select c.titulo from post c where c.id = a.id_post limit 1)
                from post_galeria a,multimedia b 
                where a.id_multimedia = b.id 
                and a.id_post = ' . $post->id  );
        
        foreach ($imagenes as $key => $imagen) {            
            if ( file_exists(public_path() .'/'. substr($imagen->ruta, 8)) ) {
                unlink(public_path() .'/'. substr($imagen->ruta, 8));
                unlink(public_path() .'/images/thumbs'. substr($imagen->ruta, 14));
                //multimedia::findOrFail('id', $imagen->id)->delete();
            }                  
        }
        
        Post::findBySlugOrFail($slug)->delete();

        return redirect('/blog');
    }

    public function verIndex()
    {   
        //aki se probara como se vera el index una vez finalizado el proyecto
         
         $estilo_color = ['background: orange; color: white; margin-bottom: 2%; padding-bottom: 30px;',
                    'background: darkviolet; color: white; padding-left: 5%; margin-bottom: 2%; padding-bottom: 30px;',
                    'background: #e42a4d; color: white; padding-bottom: 30px;'];

        //$posts = Post::all();
        $posts = DB::table('post')
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
        foreach ($posts as $key => $post) {
                    
            //dd($post->id);
        }

        $productos = DB::table('producto_venta')
                ->orderBy('id', 'desc')
                ->get();
                
        $productos_4 = $productos->take(4);

        $productos->forget(0);
        $productos->forget(1);
        $productos->forget(2);
        $productos->forget(3);
        //dd($productos->toArray());
        return view('admin.post.index_test')
            ->with('posts', $posts)
            ->with('estilo_color',$estilo_color)
            ->with('productos_4',$productos_4)
            ->with('productos',$productos);
    }

    public function deleteImg( $id)
    {
        $imagen = multimedia::find($id);
        $images = $imagen;
        //dd($imagen->ruta);

        //File::delete($imagen);
        //elimina la magen en tamaño orignal
        unlink(public_path() .'/'. substr($imagen->ruta, 8));
        //Elimina la imagen en miniatura
        unlink(public_path() .'/images/thumbs'. substr($imagen->ruta, 14));
        
        post_galeria::where('id_multimedia', $id)->delete();
        multimedia::findOrFail($id)->delete();

        return ['images' => $images];
        //return redirect('/');

    }
    public function editing( $slug)
    {
        //dd(Post::findBySlug($slug));
        $post = DB::table('post')
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->join('post_galeria', 'post_galeria.id_post', '=' , 'post.id' )
            ->join('multimedia', 'multimedia.id' , '=' , 'post_galeria.id_multimedia' )
            ->select('post.descripcion', 'post.id' , 'post.titulo' , 'post.slug' ,
                'post.id_categoria_post', 'multimedia.ruta' )
            ->first();
        //dd($post);
        //buscamos todas las imagenes relacionadas con el producto    
        $imagenes = DB::select('select b.id, a.id_post,b.ruta,
                (select c.titulo from post c where c.id = a.id_post limit 1)
                from post_galeria a,multimedia b 
                where a.id_multimedia = b.id 
                and a.id_post = ' . $post->id  );
        //Buscamos todas las categorioas asociadas al producto
        $categorias_padres = DB::select('select * from categoria_post where id_categoria_padre = 0');
        $lvl_3 = DB::select('select * from categoria_post where id =' . $post->id_categoria_post);
        
        $lvl_2 = DB::select('select * from categoria_post where id =' . $lvl_3[0]->id_categoria_padre);

        $lvl_1 = DB::select('select * from categoria_post where id =' . $lvl_2[0]->id_categoria_padre);
        //dd($imagenes);
        return view('admin.post.editar_post')
            ->with('post', $post)
            ->with('imagenes', $imagenes)
            ->with('categorias_padres', $categorias_padres)
            ->with('lvl_3', $lvl_3)
            ->with('lvl_2', $lvl_2)
            ->with('lvl_1', $lvl_1);        

    } 

    public function update(Request $request, $id)
    {
        //dd($id);
        //dd($request->all());
        if (empty($request->id_image) ) {
            return redirect('/blog')
                        ->withErrors("Debes seleccionar 1 imagen")
                        ->withInput();
            //return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
        }
        $post = Post::find($id);
        $post->id_categoria_post = $request->id_categoria_post;
        $post->titulo = $request->titulo;
        $post->descripcion =  $request->descripcion;
        //$post->slug = $request->titulo;
       
        //$post->estado = 1;
        $post->save();

        if (isset ($request->id_image)) {
            //dd($request->id_image);
            foreach ($request->id_image as $key => $value){
                $post_galeria = new post_galeria();
                $post_galeria->id_multimedia =  $request->id_image[$key];
                $post_galeria->id_post = $post->id;
                $post_galeria->save();
            }
        }else{
            return redirect('/blog');
        }
        return redirect('/blog');
    }

    


}