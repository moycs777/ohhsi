@extends('layouts.main_front')

@section('content')
    <!--Producto-->
    <?php 
        $prod = substr($producto->ruta, 8);
    ?>  
    <div class="container" style="margin: 0 auto">
        <div class="producto">
                <div class="col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                    <div class="img_grande">
                        <img class="img-responsive" id="img_grande" src="{{ asset($prod) }}"  alt="{{$producto->titulo}}">
                    </div>
                    @foreach($imagenes as $imagen)
                    <?php 
                        $ruta = substr($imagen->ruta, 8);
                     ?>                    
                        <div class="col-xs-3 col-md-3 minis">
                            <img id="img_pq" src="{{ asset($ruta) }}"  alt="{{$producto->titulo}}" data-image="{{asset('img/products.png')}}" >
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="col-md-12 titulo_prod">
                        <h2 style="margin: 0 0 60px 0!important;"><strong>{{$producto->titulo}}</strong></h2>
                        <div class="col-md-9">
                            <p>Calificar este item:</p>
                            <h2 style="color: #e42a4d; margin: 60px 0 !important;"><strong>Precio: $ {{$producto->precio_venta}}</strong></h2>
                        </div>
                        <div class="col-md-3">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                            <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                        </div>
                        <form class="form-horizontal" id="" role="form" method="POST" action="{{route('producto.comprar' , ['id'=> Auth::user()->id])}}" method="post" id="">{{ csrf_field() }}
                            <div class="col-md-7">
                               <label for="">Cantidad disponible</label>
                               <input type="text"  disabled="disabled" style="width: 50px; margin-bottom: 10px;" value="{{$producto->cantidad}}">
                               <br>
                               <label for="">Cantidad a comprar</label>
                               <input type="number" name="cantidad" min="0" max="{{$producto->cantidad}}" style="width: 50px;" required>
                            </div>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-block btn-primary" value="COMPRAR">
                            </div>
                                <input type="hidden" name="precio" value="{{$producto->precio_venta}}">
                                <input type="hidden" name="id_producto_venta" value="{{$producto->id}}">
                        </form>
                    </div>
                </div>
                <div class="col-md-12" id="descripc">
                    <h4><strong>DESCRIPCION DEL PRODUCTO</strong></h4>
                    <p>{!!$producto->descripcion!!}</p>
                </div>
        </div>
    </div>
    
    

    @if(!empty($producto->testimonio))
        <!--Middle Testimonios-->
        <div class="container-fluid">
            <div class="col-md-4">
                <hr id="linea_rec">
            </div>
            <div class="col-md-4 text-center">
                <h5>TESTIMONIOS</h5>

            </div>
            <div class="col-md-4">
                <hr id="linea_rec">
            </div>
        </div>
    @else
        
    @endif

    <div class="container-fluid" style="background-color: #e42a4d">
        <div class="row" style="margin: 30px 0;">
        @isset( $producto->testimonio )    
            @foreach($producto->testimonio as $testimonio)
                <div class="col-xs-8 col-md-4">
                    <div class="thumbnail">
                        <div class="row">
                            <div class="col-md-3" style="margin: 10% 0;">
                                <img id="usuario" class="img-thumbnail" src="{{asset('img/usuario.png')}}" alt="...">
                                
                                @for ($i = 0; $i <= $testimonio->estrellas-1; $i++)
                                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                @endfor
                               
                            </div>
                            <div class="col-md-9">
                                <h4>Anonimo</h4>
                                <p style="float: center">{{$producto->testimonio[$loop->iteration-1]->opinion}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endisset    
            
        </div>
    </div>
    <!--Productos Recomendados-->
    <div class="container-fluid">
            <div class="middle" style="margin: 30px 0;">
                <div class="col-md-4">
                    <hr id="linea_rec">
                </div>
                <div class="col-md-4 text-center">
                    <h5>PRODUCTOS RECOMENDADOS</h5>
                </div>
                <div class="col-md-4">
                    <hr id="linea_rec">
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2" style="margin-top: 50px; text-align: center">
                <div class="row">
                    @isset($recomendaciones)
                        @foreach($recomendaciones as $recomen)
                            {{-- {{$recomen->promedio}} --}}
                            <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                                <?php 
                                    $recom_ruta = substr($recomen->imagen[0]->ruta, 8);
                                ?>
                                <a href="{{ route('ver.producto', ['slug' => $recomen->slug]) }}"><img class="img-responsive" src="{{ asset($recom_ruta) }}" alt="..."></a>
                                <div class="hearts" style="margin: 2%;">
                                    @for($i = 0; $i <= $recomen->promedio-1; $i++)
                                        <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                                    @endfor
                                </div>
                                <div class="nombre" style="margin: 2%; padding: 0;  max-height: 40px; min-height: 40px;">{{$recomen->titulo}}</div>
                                <div class="precio" style="margin: 2%; padding: 0;">${{$recomen->precio_venta}}</div>
                            </div>
                        @endforeach
                    @endisset    
                    {{-- <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
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
                    </div> --}}
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script src="{{asset('js/pages/producto.js')}}"></script>
@endsection