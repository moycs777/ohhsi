@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Registro de Usuario</h4>
                    </div>
                    <div class="card-content">
                        <form class="form-horizontal" id="crear_user" role="form" method="POST" action="{{ url('registerp') }}"">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label" style="font-size: 14px;">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Apellido</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <label for="estado" class="col-md-4 control-label" style="font-size: 14px;">Estado</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="sel1">
                                        <option name="estado" id="estado" value="{{ old('estado') }}">A</option>
                                        <option name="estado" id="estado" value="{{ old('estado') }}">I</option>
                                    </select>
                                    @if ($errors->has('estado'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label" style="font-size: 14px;">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label" style="font-size: 14px;">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label" style="font-size: 14px;">Confirmar Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="registrar">
                                        Registrar
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