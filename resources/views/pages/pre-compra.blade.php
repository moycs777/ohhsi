@extends('layouts.main_front')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Informacion para el pago</h4>
                    </div>
                    <div class="card-content">
                        <form class="form-horizontal" id="crear_user" role="form" method="POST" action="{{route('perfil.grabar' , ['id'=> Auth::user()->id])}}" method="post" id="">{{ csrf_field() }}
                                                  
                            <div class="form-group{{ $errors->has('nombre_contacto') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label" style="font-size: 14px;">Nombre de contacto</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="nombre_contacto" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('nombre_contacto'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre_contacto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Pais</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="pais" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('pais'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('direccion1') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Direccion 1</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="direccion1" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('direccion1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('direccion1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('direccion2') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Direccion 2</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="direccion2" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('direccion2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('direccion2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Estado</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="estado" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('estado'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Ciudad</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="ciudad" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('ciudad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Telefono</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="telefono" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('codigo_postal') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Codigo postal</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="codigo_postal" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('codigo_postal'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('codigo_postal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="registrar">
                                        Guardar Direccion
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            




            $('#name').on("keypress",function (key) {
                window.console.log(key.charCode)
                if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                    && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                    && (key.charCode != 45) //retroceso
                    && (key.charCode != 241) //ñ
                    && (key.charCode != 209) //Ñ
                    && (key.charCode != 32) //espacio
                    && (key.charCode != 225) //á
                    && (key.charCode != 233) //é
                    && (key.charCode != 237) //í
                    && (key.charCode != 243) //ó
                    && (key.charCode != 250) //ú
                    && (key.charCode != 193) //Á
                    && (key.charCode != 201) //É
                    && (key.charCode != 205) //Í
                    && (key.charCode != 211) //Ó
                    && (key.charCode != 218) //Ú

                )return false;
                console.log($(this));
            });
            $('#lastname').on("keypress",function (key) {
                window.console.log(key.charCode)
                if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                    && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                    && (key.charCode != 45) //retroceso
                    && (key.charCode != 241) //ñ
                    && (key.charCode != 209) //Ñ
                    && (key.charCode != 32) //espacio
                    && (key.charCode != 225) //á
                    && (key.charCode != 233) //é
                    && (key.charCode != 237) //í
                    && (key.charCode != 243) //ó
                    && (key.charCode != 250) //ú
                    && (key.charCode != 193) //Á
                    && (key.charCode != 201) //É
                    && (key.charCode != 205) //Í
                    && (key.charCode != 211) //Ó
                    && (key.charCode != 218) //Ú

                )return false;
                console.log($(this));
            });
           $('#registrar').click(function () {
                var pass = $('#password').val();
                if ($('#password-confirm').val() != pass){
                    alert('Las contraseña no coinciden');
                    $("#crear_user").submit(function(e){
                        return false;
                    });
                }else {
                    $("#crear_user").submit(function (e) {
                        return true;
                    });
                }
            });
        });
    </script>
@endsection

