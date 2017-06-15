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
                                    <td class="table-text">
                                        <div name="producto" value="{!! $producto->id!!}">  {{  $producto->titulo }}</div>                                       
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">$  {{  $producto->precio_venta }}</div>
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">  {{  $producto->cantidad }}</div>
                                    </td>
                                    <td>
                                        <div name="producto" value="{!! $producto->id!!}">
                                            <img src="http://localhost/ohhsi.{{$producto->ruta}}" width="50" height="50" alt="{{$producto->titulo}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            <a href="productos/ver/{{ $producto->slug }}"><button>Ver Producto</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="productos/delete/{{ $producto->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button>Borrar Producto</button>
                                        </form>
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
    {{ $totalProductos->links() }}
@endsection

@section('script')
@endsection