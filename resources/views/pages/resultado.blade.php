@extends('layouts.main_front')

@section('content')
    <div class="container" style="margin-top: 20px; padding: 0 6%;">
        <div class="row">
            <div class="col-md-12 text-center">
                
             {{-- prueba --}}   

                {{-- original --}}
                @if(isset($categorias))
                    <button class="btn btn-primary" id="palabras" name="palabras">
                        Lubricante
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-primary" id="palabras" name="palabras">
                        Lubricar
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <hr id="linea_rec">
                @endif    
                
                @if( $alerta == true )
                    <div class="resultado">
                        <div style="float: left; padding: 0 34% 1% 19%;" id="encontrados">No fueron encontrados productos </div>
                        <div style="right: auto">
                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" id="icon_hr"></span>
                            <span class="glyphicon glyphicon-th" aria-hidden="true" id="icon_cuadros"></span>
                        </div>
                    </div>                    
                @endif
                @if( $alerta == false )
                    <div class="resultado">
                        <div style="float: left; padding: 0 34% 1% 19%;" id="encontrados">Fueron encontrados {{count($productos)}} productos </div>
                        <div style="right: auto">
                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" id="icon_hr"></span>
                            <span class="glyphicon glyphicon-th" aria-hidden="true" id="icon_cuadros"></span>
                        </div>
                    </div>                    
                @endif

            </div>
            
            
               <div class="col-sm-2 col-xs-12 text-center" id="categorias">
                    <h5>Todas las categorias</h5>
                    <hr id="linea_rec">
                    <ul style="padding: 0 !important;">
                        @foreach($categoriasAll as $CategoriaA)
                            <a href="{{ route('categorias', ['slug' => $CategoriaA->slug]) }}">
                                <li style="list-style: none">{{ $CategoriaA->descripcion}}</li></a>
                        @endforeach    
                        
                    </ul>
                </div>
               

           @if(isset($productos))
           <div class="col-sm-10 col-xs-12" id="busq_productos_horz">
                <div class="col-md-12">
                    
                    @foreach($productos as $producto)
                    <div class="row" style="border: solid 1px #e42a4d; background: #ffffff; margin-bottom: 20px;">
                        
                        <?php 
                            $ruta = substr($producto->imagen[0]->ruta, 8);
                            $thumby = 'images/thumbs/' . substr($ruta, 7);
                        ?>
                        <div class="col-xs-6 col-md-2">
                            <a href="{{ route('ver.producto', ['slug' => $producto->slug]) }} "><img class="img-responsive" src="{{ asset($thumby) }}" alt="{{$producto->titulo}}"></a>
                        </div>
                        <div class="col-md-5 text-left">
                            <div class="hearts" style="margin: 2%;">
                                @if(count($producto->calificacion) > 0 )       
                                    @for ($i = 0; $i < $producto->calificacion; $i++)
                                        <img id="hearts" src="{{asset('img/corazon.png')}}" alt="">
                                    @endfor
                                @endif

                            </div>
                            <div class="nombre" style="margin: 2%; padding: 0;">{{$producto->titulo}}</div>
                            <div class="precio" style="margin: 2%; padding: 0;">{{$producto->precio_venta}}</div>
                        </div>
                        <div class="col-md-5 text-center">
                            <a href="{{ route('ver.producto', ['slug' => $producto->slug]) }} " class="btn btn-default" style="margin-top: 10%;">Ver Producto</a>
                        </div>
                    </div>
                    @endforeach 
                    {{ $productos->links() }}

                </div>
            </div>
           @else()
               <p>No hay productos</p>
           @endif

           @if(isset($productos))
               <div class="col-sm-10 col-xs-12" id="busq_productos"style="display: none;">
                    <div class="row">
                        <div class="col-md-3 col-xs-8">
                        @foreach($productos as $producto)
                            <div class="row" style="border: solid 1px #e42a4d; background: #ffffff; margin-bottom: 20px;">
                                <?php
                                $ruta = substr($producto->imagen[0]->ruta, 8);
                                $thumby = 'images/thumbs/' . substr($ruta, 7);
                                ?>
                                <a href="{{ route('ver.producto', ['slug' => $producto->slug]) }} "><img class="img-responsive" src="{{ asset($thumby) }}" alt="{{$producto->titulo}}"></a>
                                <div class="col-md-5 text-left">
                                    <div class="hearts" style="margin: 2%;">
                                        @if(count($producto->calificacion) > 0 )
                                            @for ($i = 0; $i < $producto->calificacion; $i++)
                                                <img id="hearts" src="{{asset('img/corazon.png')}}" alt="">
                                            @endfor
                                        @endif

                                    </div>
                                    <div class="nombre" style="">{{$producto->titulo}}</div>
                                    <div class="precio" style="">{{$producto->precio_venta}}</div>
                                </div>
                            </div>
                        @endforeach
                        {{ $productos->links() }}
                        </div>
                    </div>
                </div>
           @else()
               <p>No hay productos</p>
           @endif


        </div>
    </div>
    <!--/Productos-->
@endsection
@section('script')
    <script src="{{asset('js/pages/resultado.js')}}"></script>
@endsection