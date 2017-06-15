@extends('admin.main')

@section('title', 'Publicar Producto')

@section('css')
    <!--  Dropzone CSS    -->
    <link href="{{asset('plugin/dropzone/css/dropzone.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugin/froala/css/froala_editor.css')}}" rel="stylesheet"/>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Publicador de Post</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{url('productos/productosGuardar')}}" method="post" class="dropzone" id="my-awesome-dropzone" style="border: none !important; margin-top: 25px;">
                                    <p style="margin: 0 auto; text-align: center">Haz click en la imagen para agregar mas imagenes</p><br>
                                    <img src="{{asset('img/imagen.png')}}" class="img-responsive" alt="imagen" style="width: 20%; margin: 0 auto;">
                                    <div class="dz-default dz-message">
                                        Click aqui!
                                    </div>
                                    <div class="dropzone-previews"></div>
                                </form>
                            </div>
                            <!--End col-md-4-->
                            <div class="col-md-8">
                                <form action="productosGuardar" class="form" role="form">
                                    <input type="hidden">
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
                                    <label for="categoria" class="col-md-12 control-label" style="font-size: 14px;">Categoría</label>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_padre">
                                            <option></option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_hijo">
                                            <option ></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_nieto">
                                            <option ></option>                        
                                        </select>
                                    </div>
                                    <div class="form-group" style="padding: 0; margin: 0">
                                        <label for="" class="col-sm-2 control-label" style="font-size: 14px;">Título</label>
                                        <input type="text" name="titulo" class="form-control" required autofocus>
                                    </div>
                                    <div id="froala-editor" style="margin-top:80px!important;">
                                        <h3>Click here to edit the content</h3>
                                        <p>The image can be dragged only between blocks and not inside them.</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Publicar Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End col-md-8-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    !--  Dropzone JS    -->
    <script src={{asset('plugin/dropzone/js/dropzone.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/froala_editor.min.js')}} type="text/javascript"></script>
    <script src={{asset('js/autoNumeric.js')}} type="text/javascript"></script>
    <script src={{asset('js/admin/producto.js')}} type="text/javascript"></script>
@endsection