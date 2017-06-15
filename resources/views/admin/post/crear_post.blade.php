@extends('admin.main')

@section('title', 'Publicar Post')

@section('css')
    <!--  Dropzone CSS    -->
    <link href="{{asset('plugin/dropzone/css/dropzone.css')}}" rel="stylesheet"/>
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
                                 <form action="{{url('blog/blogGuardar')}}" method="post" class="dropzone" id="my-awesome-dropzone" style="border: none !important; margin-top: 25px;">
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
                                <form action="{{url('blog/blogGuardarForm')}}" class="form" method="post"  id="myform">
                                     <!--input type="hidden" id="id_image" name="id_imagen[]" value=""-->
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
                                        <select class="form-control" id="categoria_padre" required>
                                            <option>Seleccione</option>
                                            @foreach($categorias_padres as $categoria)
                                                <option value="{{$categoria->id}}" id="option_padre">{{$categoria->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_hijo">
                                            <option >Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="id_categoria_post" class="form-control" id="categoria_nieto" required>
                                            <option>Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="padding: 0; margin: 0">
                                        <label for="" class="col-sm-2 control-label" style="font-size: 14px;">Título</label>
                                        <input type="text" name="titulo" class="form-control" required autofocus>
                                    </div>
                                     <div class="col-md-12">
                                        <textarea name="descripcion">Descripcion del post.</textarea>
                                        <script src="HTTP://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zaxjpord1sh4qv9bknisreuduh2kcthyj3niih2r1zvfejuu"></script> 
                                        <script>
                                            tinymce.init({ selector:'textarea',plugins: [
                                                "advlist autolink lists link charmap print preview hr anchor pagebreak",
                                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                                "insertdatetime media nonbreaking save table contextmenu directionality",
                                                "emoticons template paste textcolor colorpicker textpattern"
                                              ], color_picker_callback: function(callback, value) {callback('#ff0043');
                                                 },
                                                
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="validar">Publicar Post</button>
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
    <script src={{asset('plugin/froala/js/froala_editor.pkgd.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/font_family.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/font_size.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/inline_style.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/line_breaker.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/link.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/lists.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/paragraph_format.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/paragraph_style.min.js')}} type="text/javascript"></script>
    <script src={{asset('plugin/froala/js/plugins/print.min.js')}} type="text/javascript"></script>
    <script src={{asset('js/autoNumeric.js')}} type="text/javascript"></script>
    <script src={{asset('js/admin/post.js')}} type="text/javascript"></script>

@endsection