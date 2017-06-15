@extends('admin.main')

@section('title', 'Categorias de Producto')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Categorias</h4>
                    </div>
                    <div class="card-content">
                        <div class="col-md-4" id="categoria_padre">
                            <div class="input-group">
                                <input class="form-control" type="text" name="categoria" id="categoria1" placeholder="Categoría" style="margin-bottom: 23px !important;" method="post" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="btn-guardar">Save</button>
                                </span>
                            </div>
                            <div class="box-padre">
                                <ul id="box-padre" style="list-style: none; margin-left: -23px;">
                                    @foreach($categorias as $categoria)
                                        @if ($categoria['id_categoria_padre'] === 0)
                                            <li>
                                                <label>
                                                    <input class="nodo_cateroria" type="radio" name="categoria" value="{!! $categoria->id!!}" />
                                                    {!! $categoria->descripcion !!}
                                                </label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4" id="categoria_hijo" style="display: none">
                            <div class="input-group">
                                <input class="form-control" type="text" name="categoria2" id="categoria2" placeholder="Categoría" style="margin-bottom: 23px !important;" method="post" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="btn-guardar2">Save</button>
                                </span>
                            </div>
                            <div class="box-padre">
                                <ul id="box-padre2" style="list-style: none; margin-left: -23px;">

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4" id="categoria_nieto" style="display: none">
                            <div class="input-group">
                                <input class="form-control" type="text" name="categoria3" id="categoria3" placeholder="Categoría" style="margin-bottom: 23px !important;" method="post" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="btn-guardar3">Save</button>
                                </span>
                            </div>
                            <div class="box-padre">
                                <ul id="box-padre3" style="list-style: none; margin-left: -23px;">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/admin/categorias.js')}}" type="text/javascript"></script>
@endsection