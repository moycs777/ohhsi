<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriasProductos;
use App\multimedia;
use App\producto_venta_galeria;
use App\ProductoVenta;
use App\CompraClienteDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Validator;
use Response;
use Redirect;
use Session;
use Image;
use File;
use DateTime;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->only('publicar');
    }

    public function index(){
       
        $totalProductos = DB::table('producto_venta')->distinct('producto_venta.id', 'producto_venta.titulo', 'producto_venta_galeria.id_multimedia')
            ->join('producto_venta_galeria', 'producto_venta_galeria.id_producto_venta', '=' ,  'producto_venta.id' )
            ->select('producto_venta.id' , 'producto_venta.titulo' , 'producto_venta.precio_venta' , 'producto_venta.cantidad', 'producto_venta.slug', 'producto_venta_galeria.id_producto_venta')
            ->orderBy('producto_venta.id', 'asc')
            ->paginate(15);
        //dd($totalProductos);

        foreach ($totalProductos as $producto) {
            //print_r('   id producto venta:   ');
            $producto_id = $producto->id_producto_venta;
            //print_r($id);

            $galeria = DB::table('producto_venta_galeria')
                ->when($producto_id, function ($query) use ($producto_id) {
                    return $query->where('id_producto_venta', $producto_id);
                })

                ->select('producto_venta_galeria.id_multimedia')
                ->first();
            //dd($galeria);
            $producto->id_multimedia = $galeria->id_multimedia;
            //print_r(($galeria->id_multimedia));

        }
        foreach ($totalProductos as $producto) {
            $ruta = multimedia::find($producto->id_multimedia);
            //print_r($ruta->ruta);
            $producto->ruta = $ruta->ruta;
        }
        return view('admin.producto.listado_productos')->with('totalProductos', $totalProductos);


    }

    public function publicar()
    {
        //return "Publicador de productos";
        $categorias_padres = DB::table('categoria_producto')->where('id_categoria_padre', 0)->get();
        return view('admin.producto.crear_producto')->with('categorias_padres', $categorias_padres);
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
        //dd($request->all());
        if (empty($request->id_image) ) {

            return redirect('productos/publicar')
                        ->withErrors("Debes seleccionar 1 o mas imagenes")
                        ->withInput();
            //return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
        } 
        
        $producto_venta = new ProductoVenta();
        $producto_venta->id_categoria_producto = $request->id_categoria_producto;
        $producto_venta->titulo = $request->titulo;
        $producto_venta->descripcion =  $request->descripcion;
        //$producto_venta->slug = $request->titulo;
        $precio_venta = str_replace(array('$',',','.'),'',$request->precio_venta );
        $precio_venta = substr($precio_venta, 0, -2);
        //dd(intval($precio_venta));
        $producto_venta->precio_venta =  $precio_venta;
        $producto_venta->cantidad = $request->cantidad;
        $producto_venta->estado = 1;
        //dd($request->all());
        $producto_venta->save();
        //dd($producto_venta);
        $id_producto_venta = $producto_venta->id;
        //dd($id_producto_venta);
        
        foreach ($request->id_image as $key => $value){

            $producto_venta_galeria = new producto_venta_galeria();
            $producto_venta_galeria->id_multimedia =  $request->id_image[$key];
            $producto_venta_galeria->id_producto_venta = $id_producto_venta;
            $producto_venta_galeria->save();
        } 
        
        return redirect('/productos');        
       
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
        $categoria_hijos = DB::table('categoria_producto')->where('id_categoria_padre', $id)->get();
        return $categoria_hijos;
        //dd($categoria_padre);
    }
    public function catprodNietos($id)
    {
        //dd($id);
        $categoria_nieto = DB::table('categoria_producto')->where('id_categoria_padre', $id)->get();
        return $categoria_nieto;
        //dd($categoria_padre);
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


       
          
        return view('pages.producto')->with('producto', $producto)->with('imagenes', $imagenes);
    }

    public function edit($slug)
    {
        $producto = DB::table('producto_venta')
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->join('producto_venta_galeria', 'producto_venta_galeria.id_producto_venta', '=' , 'producto_venta.id' )
            ->join('multimedia', 'multimedia.id' , '=' , 'producto_venta_galeria.id_multimedia' )
            ->select('producto_venta.descripcion', 'producto_venta.id' , 'producto_venta.titulo' , 'producto_venta.precio_venta' , 'producto_venta.cantidad', 'producto_venta.slug' ,
                'producto_venta.id_categoria_producto', 'multimedia.ruta' )
            ->first();
        //buscamos todas las imagenes relacionadas con el producto    
        $imagenes = DB::select('select a.id_producto_venta,b.ruta, b.id,
                (select c.titulo from producto_venta c where c.id = a.id_producto_venta limit 1)
                from producto_venta_galeria a,multimedia b 
                where a.id_multimedia = b.id 
                and a.id_producto_venta = ' . $producto->id  );
        //Buscamos todas las categorioas asociadas al producto
        $categorias_padres = DB::select('select * from categoria_producto where id_categoria_padre = 0');
        $lvl_3 = DB::select('select * from categoria_producto where id =' . $producto->id_categoria_producto);
        
        $lvl_2 = DB::select('select * from categoria_producto where id =' . $lvl_3[0]->id_categoria_padre);

        $lvl_1 = DB::select('select * from categoria_producto where id =' . $lvl_2[0]->id_categoria_padre);
        //dd($lvl_3);
        return view('admin.producto.editar_producto')
            ->with('producto', $producto)
            ->with('categorias_padres', $categorias_padres)
            ->with('imagenes', $imagenes)
            ->with('lvl_3', $lvl_3)
            ->with('lvl_2', $lvl_2)
            ->with('lvl_1', $lvl_1);        

    } 

    public function update(Request $request, $id)
    {
        //dd($id);
        //dd($request->all());
        /*if (empty($request->id_image) ) {
            return redirect('productos/publicar')
                        ->withErrors("Debes seleccionar 1 o mas imagenes")
                        ->withInput();
            //return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
        }*/
        $producto_venta = ProductoVenta::find($id);
        $producto_venta->id_categoria_producto = $request->id_categoria_producto;
        $producto_venta->titulo = $request->titulo;
        $producto_venta->descripcion =  $request->descripcion;
        //$producto_venta->slug = $request->titulo;
        $precio_venta = str_replace(array('$',',','.'),'',$request->precio_venta );
        $precio_venta = substr($precio_venta, 0, -2);
        //dd(intval($precio_venta));
        $producto_venta->precio_venta =  $precio_venta;
        $producto_venta->cantidad = $request->cantidad;
        $producto_venta->estado = 1;
        //dd($request->all());
        $producto_venta->save();

        if (isset ($request->id_image)) {
            //dd($request->id_image);
            foreach ($request->id_image as $key => $value){
                $producto_venta_galeria = new producto_venta_galeria();
                $producto_venta_galeria->id_multimedia =  $request->id_image[$key];
                $producto_venta_galeria->id_producto_venta = $producto_venta->id;
                $producto_venta_galeria->save();
            }
        }else{
            return redirect('/productos');
        }
        return redirect('/productos');
    }
    
    public function deleteImg($id)
    {
        $imagen = multimedia::find($id);
        $images = $imagen;
        //dd($imagen->ruta);

        //File::delete($imagen);
        //elimina la magen en tamaño orignal
        unlink(public_path() .'/'. substr($imagen->ruta, 8));
        //Elimina la imagen en miniatura
        unlink(public_path() .'/images/thumbs'. substr($imagen->ruta, 14));
        
        producto_venta_galeria::where('id_multimedia', $id)->delete();
        multimedia::findOrFail($id)->delete();

        return ['images' => $images];
        //return redirect('/');
    }

    public function delete($slug)
    {
        //dd($id);
        //verificar q el producto tengaalguna relacion
        $prod = ProductoVenta::findBySlugOrFail($slug);
        $existe = CompraClienteDetalle::where('id_producto_venta', $prod->id)->first();

        if (!$existe == null) {
            //return "existe y no se puede borrar";
            return redirect('/productos')                
                ->withErrors("Este producto no se puede eliminar debido hay que hay 1 o mas compras relacionadas a el");
        }
        
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
        
        ProductoVenta::findBySlugOrFail($slug)->delete();

        foreach ($imagenes as $key => $imagen) {
                
            $borrar = public_path() .'/'. substr($imagen->ruta, 8);
            if ( file_exists($borrar) ) {
                //dd($borrar);
                unlink($borrar);
                unlink(public_path() .'/images/thumbs'. substr($imagen->ruta, 14));
            }
            //unlink('c:/xampp/htdocs/ohhsi' . $imagen->ruta);        
            //dd($value);
        }
        
        

        return redirect('/productos');
    }

}