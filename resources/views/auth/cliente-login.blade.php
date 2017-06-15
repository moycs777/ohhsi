<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ohh Si</title>
    <link href="{{asset('plugin/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet">
    <style>
        *{color: #FFFFFF;}
    </style>
</head>
<body>
    <div class="fondo">
        <img class="img-responsive center-block" src="{{asset('img/logo-login.png')}}" alt="Ohh SI" id="logo">
        <img class="img-responsive center-block" src="{{asset('img/transparencia.png')}}" alt="Ohh SI Girl" id="girl">
        <div class="row">
            <div class=" col-md-offset-1 col-md-5" style="margin-bottom: 30px;">
                 
                 <form class="form-horizontal" role="form" method="POST" action="{{ route('cliente.register.submit') }}">
                        {{ csrf_field() }}
                    <h2 class="form-signin-heading">Nueva Cuenta</h2>

                        <div>
                            @if(isset($messages))
                                <li style="color:black !important;">{{ $messages }}</li>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul style="color:black !important;">
                                        @foreach ($errors->all() as $error)
                                            <li style="color:black !important;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                    <p>¿Aun no estas Registrado?</p>
                    <div class="form-inline">
                        <label for="" class="sr-only">Nombre</label>
                        <input type="text" class="form-control nombre" placeholder="Nombre" style="margin-bottom: 10px;" name="name" id="nombre" required>
                        <label for="" class="sr-only">Apellido</label>
                        <input type="text" class="form-control  col-md-offset-2" placeholder="Apellido" style="margin-bottom: 10px;" name="lastname" id="apellido" required>
                    </div>
                    <div class="form-inline">
                        <label for="" class="sr-only">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad" style="margin-bottom: 10px;" name="edad" required>
                        <label for="power" class="col-md-offset-2">Genero</label>
                        <select class="form-control" id="genero" style="background: #fff;" required>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </div>
                    <label for="" class="sr-only">Direccion</label>
                    <input type="text" class="form-control" placeholder="Direccion"style="margin-bottom: 10px;" name="direccion" required>
                    <label for="" class="sr-only">Ubicacion</label>
                    <input type="text" class="form-control" placeholder="Ubicacion"style="margin-bottom: 10px;" name="ubicacion" required>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required style="margin-bottom: 10px;" name="email">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Recuerda me
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" style="border-color: white !important;">Registrate</button>
                </form>
            </div>
            <div class="col-md-1">
                <img class="img-responsive" src="{{asset('img/linea-v.jpg')}}" style="margin-top: 100px;" id="linea">
            </div>
            <div class="col-md-4">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('cliente.login.submit') }}">
                        {{ csrf_field() }}
                        
                        <div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul style="color:black !important;">
                                        @foreach ($errors->all() as $error)
                                            <li style="color:black !important;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                    <h2 class="form-signin-heading">Ingresa</h2>
                    <p>Ingresa con tu correo y contraseña!</p>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" style="margin-bottom: 10px;" name="email" required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required
                           id="color-place" name="password" required>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Recuerda me
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" style="border-color: white !important;">Ingresa</button>
                    
                </form>
                <div>social                    
                    <a href="{{ url('/clientelogin/facebook') }}"><button class="btn btn-primary btn-block" style="border-color: white !important;">Ingresa con Facebook</button></a>
                    <a href="{{ url('/clientelogin/twitter') }}"><button class="btn btn-primary btn-block" style="border-color: white !important;">Ingresa con Twitter</button></a>
                    <a href="{{ url('/clientelogin/google') }}"><button class="btn btn-primary btn-block" style="border-color: white !important;">Ingresa con Google</button></a>
                </div>
            </div>
        </div>
    </div>
    @include('pages.partials.redes')
    @include('pages.partials.footer')
</body>
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.nombre').on("keypress",function (key) {
            //window.console.log(key.charCode)
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
        $('#apellido').on("keypress",function (key) {
            //window.console.log(key.charCode)
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
    });
</script>
</html>