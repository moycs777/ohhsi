@extends('admin.main')

@section('title', 'Informacion del despacho')

@section('css')
    <!--  Chartist SASS    -->
    <link href="{{asset('plugin/chartist/sass/_chartist.scss')}}" rel="text/css"/>
@endsection

@section('content')

    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Informacion del envio</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                               <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Fecha de compra</th>
                                        <th>Estatus(Despacho)</th>
                                        <th>Monto</th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        
                                                <tr>
                                                    <!-- Task Name -->
                                                    <td class="table-text">
                                                        <div name="posts" >
                                                            <img src="http://localhost/ohhsi.{{$venta[0]->ruta}}" width="50" height="50" alt="{{$venta[0]->titulo}}">
                                                        </div>                                      
                                                    </td>
                                                    <td class="table-text">
                                                        <div name="posts" >  {{  $venta[0]->name }}</div>                                       
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >  {{  $venta[0]->lastname }}</div>

                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->titulo!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->cantidad!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->precio_venta!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->fecha_compra!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >
                                                            
                                                            @if ($venta[0]->despacho == false)
                                                                <p>Sin despachar</p>
                                                            @elseif($venta[0]->despacho == true)
                                                                <p style="color: #ef5350;">Despachado</p>  
                                                            @endif
                                                        </div>
                                                    </td>
                                                     <td>
                                                        <div name="ventas" >{!!$venta[0]->monto_compra!!}</div>
                                                    </td>
                                                    <td>                                                        
                                                    </td>

                                                </tr>
                                            
                                        </tbody>
                                    </table>

                                </div>       

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Nombre de contacto </th>
                                        <th>Pais</th>
                                        <th>Estado</th>
                                        <th>Ciudad</th>
                                        <th>Direccion 1</th>
                                        <th>Direccion 2</th>
                                        <th>Codigo Postal</th>
                                        <th>Telefono</th>
                                        </thead>
                                        <tbody>
                                        
                                                <tr>
                                                    <!-- Task Name -->
                                                    <td class="table-text">
                                                       <div name="posts" >  {{  $venta[0]->nombre_contacto }}</div>                                       
                                                    </td>
                                                    <td class="table-text">
                                                        <div name="posts" >  {{  $venta[0]->pais }}</div>                                       
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >  {{  $venta[0]->estado }}</div>

                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->ciudad!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->direccion1!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->direccion2!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->codigo_postal!!}</div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >{!!$venta[0]->telefono!!}</div>
                                                    </td>                                                    

                                                    <td>
                                                        @if ($venta[0]->despacho == false)
                                                            <a class="btn btn-primary pull-right" href="{{ route('despachos.despachar', ['id'=> $venta[0]->id]) }}" role="button">Despachar</a>

                                                            {{-- <button class="btn btn-danger"><a href="{{ route('despachos') }}">Despachar<a/></button> --}}
                                                        @else
                                                            <a class="btn btn-primary pull-right" href="{{ route('despachos') }}" role="button">Atras</a>
                                                            {{-- 
                                                            <button class="btn btn-primary">Ver detalles</button> --}}  
                                                        @endif
                                                        
                                                      
                                                    </td>

                                                </tr>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
            <script src={{asset('plugin/chartist/js/chartist.min.js')}} type="text/javascript"></script>
            <script src={{asset('js/admin/estadisticas.js')}} type="text/javascript"></script>
@endsection