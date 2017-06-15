<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title', 'Ohhsi') | Panel Administrativo'</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('plugin/bootstrap/css/bootstrap.css')}}" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('plugin/material/css/material-dashboard.css')}}" rel="stylesheet"/>
    <!-- Custom Style CSS     -->
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="{{asset('plugin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    @yield('css')
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="logo">
            <a href="{{ url('/admin') }}"><img src="{{asset('img/logo-small.png')}}" alt=""></a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="{{ url('/admin') }}">
                        <i class="material-icons" style="color:#a9afbb">dashboard</i>
                        <p>Panel Administrativo</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Configuración
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/users') }}">
                                <i class="material-icons">person</i>
                                Usuarios
                            </a>
                        </li>
                        <li><a href="{{ url('register') }}">Registrar Usuario</a></li>
                        <li><a href="{{ url('categorias') }}">Categorías Productos</a></li>
                        <li><a href="{{ url('categoriasBlog') }}">Categorías Blog</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Post
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('blog/publicar') }}">Publicar un Post</a></li>
                        <li><a href="{{ url('blog') }}">Listados de Post</a></li>
                        <li><a href="{{ route('inicio') }}">Index</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ventas
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/productos/publicar') }}">Publicar Productos</a></li>
                        <li><a href="{{ url('/productos') }}">Productos en Venta</a></li>
                        <li><a href="#">Calificaciones de Productos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Inventario
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('despachos') }}">Despacho</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Opciones
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/logout') }}">Salir</a></li>
                        <ul class="dropdown-menu">
                            <li><a href="#">
                                 @if (Auth::check())
                                    {{ Auth::user()->email }}
                                 @endif</a>
                            </li>
                        </ul>    
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Panel Administrativo</a>
                </div>
                <div class="collapse navbar-collapse">





                </div>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugin/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('plugin/material/js/material.min.js')}}" type="text/javascript"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('plugin/material/js/material-dashboard.js')}}"></script>
<!--Script Costum-->
@yield('script')
</html>
