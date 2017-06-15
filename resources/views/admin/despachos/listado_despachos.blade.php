@extends('admin.main')

@section('title', 'Despachos')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Despachos</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Producto</th>
                        <th>Fecha de compra</th>
                        <th>Estatus(Despacho)</th>
                        <th>Monto</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        @if (count($ventas) > 0)
                            @foreach ($ventas as $venta)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div name="posts" >  {{  $venta->name }}</div>                                       
                                    </td>
                                    <td>
                                        <div name="ventas" >  {{  $venta->lastname }}</div>

                                    </td>
                                    <td>
                                        <div name="ventas" >{!!$venta->titulo!!}</div>
                                    </td>
                                    <td>
                                        <div name="ventas" >{!!$venta->fecha_compra!!}</div>
                                    </td>
                                    <td>
                                        <div name="ventas" >
                                            
                                            @if ($venta->despacho == false)
                                                <p>Sin despachar</p>
                                            @elseif($venta->despacho == true)
                                                <p style="color: #ef5350;">Despachado</p>  
                                            @endif
                                        </div>
                                    </td>
                                    
                                    
                                     <td>
                                        <div name="ventas" >{!!$venta->monto_compra!!}</div>
                                    </td>

                                    <td>
                                        @if ($venta->despacho == false)
                                            <a class="btn btn-primary pull-right" href="{{ route('despachos.ver', ['id'=> $venta->id]) }}" role="button">Ir a Despachar</a>

                                            {{-- <button class="btn btn-danger"><a href="{{ route('despachos') }}">Despachar<a/></button> --}}
                                        @else
                                            <a class="btn btn-primary pull-right" href="{{ route('despachos.ver', ['id'=> $venta->id]) }}" role="button">Ver detalle</a>
                                            {{-- 
                                            <button class="btn btn-primary">Ver detalles</button> --}}  
                                        @endif
                                        
                                       {{--  <form action="blog/delete/{{ $venta->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Ver detalles</button>
                                        </form> --}}
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection