
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ohh Si</title>
    <link href="{{asset('plugin/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="styleshee">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet">
</head>
<body>
    @include('pages.partials.navbar_login')
    @yield('content')
    @include('pages.partials.redes')
    @include('pages.partials.footer')

</body>
<!-- *** SCRIPTS TO INCLUDE ***-->
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('plugin/bootstrap/js/bootstrap.js')}}"></script>
<!--Script Costum-->
@yield('script')
</html>
