@extends('layouts.main_front')

@section('title', 'Blog')

@section('content')
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <!--Blog-->            
            <div class="col-md-8 col-md-offset-2" style="padding: 0!important;">
                <?php 
                    $ruta = substr($post->ruta, 8);
                 ?>
                <img class="img-responsive" src="{{ asset($ruta) }}" alt="{{$post->titulo}}">
            </div>
            <div class="col-md-8 col-md-offset-2" style="background: #e42a4d; color: white; padding-bottom: 30px;">
                <div class="col-md-12 blog">
                    <h2 style="text-align: center">{{$post->titulo}}</h2>
                    <div style="padding: 10px; margin: 0 5%; margin-bottom: 10px; width: auto!important;" class="columnas">{!!$post->descripcion!!}</div>
                </div>               
            </div>
            <!--/Blog-->
            <!--Productos-->            
            
        </div>
    </div>
    
    </div>
    <!--/Productos-->
@endsection
@section('script')
    <script src="{{asset('js/pages/blog.js')}}"></script>
@endsection



{{-- style="background: #e42a4d; --}}