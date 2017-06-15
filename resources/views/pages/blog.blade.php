@extends('layouts.index')

@section('content')
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            
            <!--Blog-->
            @foreach($posts as $post)
             <br/>
                <?php 
                    $ruta_post = substr($post->imagen[0]->ruta, 8);
                    $thumby = 'images/thumbs/' . substr($ruta_post, 7);
                ?>
                @if ($loop->iteration == 1)
                     <div class="col-md-10 col-md-offset-2" style="background: orange; color: white; margin-bottom: 2%; padding-bottom: 30px;">
                        <div class="blog1 col-md-10" style="margin-top: 30px;">
                            <div class="col-md-2" id="side_image">
                                <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas"><img class="img-responsive" src="{{ asset($thumby) }}" alt="{{$post->titulo}}" > 
                                
                                </a>
                            </div>
                            <div class="col-md-4" style="width: 600px;">
                                <h2 id="titulo_blog">{{$post->titulo}}</h2>
                                <div style="padding: 10px;" class="columnas">{!! $post->descripcion !!}</div>
                            </div>
                            <div class="col-md-12 text-right" style="padding-right: 7%;">
                                <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                    <br/>
                @elseif($loop->iteration == 2)
                     <div class="col-md-10" style="background: darkviolet; color: white; padding-left: 5%; margin-bottom: 2%; padding-bottom: 30px;">
                        <div class="blog2 col-md-10 col-md-offset-2" style="margin-top: 30px;">
                            <div class="col-md-4" style="width: 600px;">
                                <h2 id="titulo_blog">{{$post->titulo}}</h2>
                                <p style="padding: 10px;" class="columnas">{!!$post->descripcion!!}</p>
                            </div>
                            <div class="col-md-2" id="side_image">
                                <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas"><img class="img-responsive" src="{{ asset($thumby) }}" alt="{{$post->titulo}}" ></a>
                            </div>
                        </div>
                        <div class="col-md-12 text-right" style="padding-right: 7%;">
                            <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas">
                                    Ver más
                            </a>
                        </div>
                    </div>
                @elseif($loop->iteration == 3) 
                    <div class="col-md-8 col-md-offset-2" style="padding: 0!important;">
                        <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas"><img class="img-responsive" src="{{ asset($ruta_post) }}" alt="{{$post->titulo}}"></a>
                            </div>
                            <div class="col-md-8 col-md-offset-2" style="background: #e42a4d; color: white; padding-bottom: 30px;">
                                <div class="col-md-12 blog">
                                    <h2 style="text-align: center">{{$post->titulo}}</h2>
                                    <div style="padding: 10px; margin: 0 5%; margin-bottom: 10px; width: auto!important;" class="columnas">{!!$post->descripcion!!}</div>
                                </div>
                                <div class="col-md-12 text-right" style="padding-right: 7%;">
                                    <a href="{{ route('blog.ver', ['slug' => $post->slug]) }}" id="vmas">
                                    Ver más
                                    </a>
                            </div>
                    </div>
                @endif    
            

            @endforeach
            <!--/Blog-->            
            <!--Productos-->

            <div class="col-md-10 col-md-offset-2" style="margin-top: 50px; text-align: center">
                <div class="row">
                    @isset($productos_4)
                     <?php 
                        //echo  $productos_4;    
                    ?>
                    @foreach($productos_4  as $p4)
                    
                        <?php 
                            $ruta = substr($p4->imagen[0]->ruta, 8);
                            $thumby = 'images/thumbs/' . substr($ruta, 7);
                        ?>
                        <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                            <a href="home/producto/{{ $p4->slug }}"><img class="img-responsive" src="{{ asset($thumby) }}" alt="{{$p4->titulo}}"></a>
                            

                            <div class="hearts" style="margin: 2%;">
                            @if(count($calificacion_4) > 0 )       
                                @for ($i = 0; $i < $calificacion_4[$loop->iteration-1]; $i++)
                                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                @endfor
                            @endif
                            
                                
                                {{-- <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt=""> --}}
                            </div>

                            <div class="nombre" style="margin: 2%; padding: 0; max-height: 40px; min-height: 40px;">{{$p4->titulo}}</div>
                            <div class="precio" style="margin: 2%; padding: 0;">${{$p4->precio_venta}}</div>
                            <div >
                                <a href="home/producto/{{ $p4->slug }}"><button>Ver Producto</button></a>
                            </div>
                        </div>
                    

                    @endforeach
                    @endisset
                       
                    
                </div>
            </div>
            <!--Productos-->
            @if(count($productos_restantes)>0)                
                    <div class="col-md-12 text-center">
                        <div style="cursor:pointer; margin-top: 50px;" id="vermas">Ver más</div>
                    </div>  
            @endif

        </div>
    </div>
    <div class="container-fluid" style="margin-top: 50px; background-color: #FFFFFF">
        <div class="col-md-10 col-md-offset-2" id="masproductos" style="display: none;  padding: 50px 0; ">
            <div class="row">
            @if(count($productos_restantes)>0)
                @foreach($productos_restantes as $p)
                    
                    <?php 
                        $p_ruta = substr($p->imagen[0]->ruta, 8);
                    ?>
                     <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <a href="home/producto/{{ $p->slug }}"><img class="img-responsive" src="{{ asset($p_ruta) }}" alt="{{$p->titulo}}"></a>
                        
                         <div class="hearts" style="margin: 2%;">
                            
                            <!-- @if(count($calificacion_r) > 0 )       
                                @for ($i = 4; $i < $calificacion_r[$loop->iteration-1]; $i++)
                                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                @endfor
                            @elseif(count($calificacion_r) < 0 )
                                nada
                            @endif -->
                            @for ($i = 0; $i <= $p->promedio-1; $i++)
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            @endfor
                               
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;">{{$p->titulo}}</div>
                        <div class="precio" style="margin: 2%; padding: 0;">${{$p->precio_venta}}</div>
                        <div >
                            <a href="home/producto/{{ $p->slug }}"><button>Ver Producto</button></a>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>

            <div class="row">
                
                      {{--   <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                            <img class="img-responsive" src="{{asset('img/product.png')}}" alt="...">
                            <div class="hearts" style="margin: 2%;">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            </div>
                            <div class="nombre" style="margin: 2%; padding: 0;">{{$producto->titulo}}</div>
                            <div class="precio" style="margin: 2%; padding: 0;">${{$producto->precio_venta}}</div>
                        </div>  --}}      
                   
            </div>
            {{-- <div class="row">
                    <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <img class="img-responsive" src="{{asset('img/product.png')}}" alt="...">
                        <div class="hearts" style="margin: 2%;">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;">Nombre del producto</div>
                        <div class="precio" style="margin: 2%; padding: 0;">$350.000</div>
                    </div>
                    <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <img class="img-responsive" src="{{asset('img/product2.png')}}" alt="...">
                        <div class="hearts" style="margin: 2%;">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;">Nombre del producto</div>
                        <div class="precio" style="margin: 2%; padding: 0;">$350.000</div>
                    </div>
                    <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <img class="img-responsive" src="{{asset('img/product.png')}}" alt="...">
                        <div class="hearts" style="margin: 2%;">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;">Nombre del producto</div>
                        <div class="precio" style="margin: 2%; padding: 0;">$350.000</div>
                    </div>
                    <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <img class="img-responsive" src="{{asset('img/product2.png')}}" alt="...">
                        <div class="hearts" style="margin: 2%;">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;">Nombre del producto</div>
                        <div class="precio" style="margin: 2%; padding: 0;">$350.000</div>
                    </div>
            </div> --}}
                
        

        </div>
    </div>
    <!--/Productos-->
@endsection
@section('script')
    <script src="{{asset('js/pages/blog.js')}}"></script>
@endsection
