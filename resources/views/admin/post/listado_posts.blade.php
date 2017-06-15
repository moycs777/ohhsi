@extends('admin.main')

@section('title', 'Posts')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Posts</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Id Post</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <!-- Task Name -->
                                    <?php 
                                        $postimg = substr($post->ruta, 8);
                                        $thumby = 'images/thumbs/' . substr($postimg, 7);
                                    ?>
                                    <td class="table-text">
                                        <div name="posts" >  {{  $post->id }}</div>                                       
                                    </td>
                                    <td>
                                        <div name="posts" >  {{  $post->titulo }}</div>

                                    </td>
                                    <td>
                                        <div name="posts" >{!!$post->descripcion!!}</div>
                                    </td>
                                    <td>
                                        <div name="posts" >
                                            <img src="{{ asset($thumby) }}" width="50" height="50" alt="{{$post->titulo}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="blog/ver/{{ $post->slug }}"><button>Ver post</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="blog/edit/{{ $post->slug }}"><button>Editar Post</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="blog/delete/{{ $post->slug }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Borrar post</button>
                                        </form>
                                    </td>
                                    <td>
                                       
                                    </td>
                                </tr>
                            @endforeach
                            {{ $posts->links() }}
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary pull-right" href="blog/publicar" role="button">Crear Post</a>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@section('script')
@endsection