@extends('admin.main')

@section('title', 'Productos')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Productos</h4>
                </div>
                @if(isset($messages))
                    <li style="color:black !important;">{{ $messages }}</li>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        @if (count($totalProductos) > 0)
                            @foreach ($totalProductos as $producto)
                                <tr>
                                    <!-- Task Name -->
                                    <?php 
                                        $prod = substr($producto->ruta, 8);
                                        $thumby = 'images/thumbs/' . substr($prod, 7);
                                    ?>  
                                    <td class="table-text">
                                        <div name="producto" value="{!! $producto->id!!}">  {{  $producto->titulo }}</div>                                       
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">$  {{  $producto->precio_venta }}</div>
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">  {{  $producto->cantidad }} </div>
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">
                                            <img src="{{ asset($thumby) }}" width="50" height="50" alt="{{$producto->titulo}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            <a href="productos/ver/{{ $producto->slug }}"><button>Ver Producto</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            <a href="productos/edit/{{ $producto->slug }}"><button >Editar Producto</button></a>
                                        </div>
                                    </td>

                                    <td>
                                        {{-- <form action="productos/delete/{{ $producto->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="borrar" onclick="borrar" >Borrar Producto</button>
                                        </form> --}}
                                    </td>
                                    <td>
                                        <form class="delete" action="{{ url('productos/delete', $producto->slug) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input class="btn btn-danger" type="submit" value="Borrar Producto">
                                            
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        {!! $totalProductos->render() !!}
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary pull-right" href="productos/publicar" role="button">Crear Producto</a>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@section('script')
    <script src={{asset('js/admin/listado_productos.js')}} type="text/javascript"></script>
@endsection
