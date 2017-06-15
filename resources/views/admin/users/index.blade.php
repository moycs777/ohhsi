@extends('admin.main')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Lista de Usuarios</h4>
                        </div>
                        
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-danger">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th></th>

                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{!! $user['id']!!}</td>
                                        <td>{!! $user['name']!!}</td>
                                        <td>{!! $user['lastname']!!}</td>
                                        <td>{!! $user['email']!!}</td>
                                        <td>{!! $user['estado'] !!}</td>
                                        <td>
                                            <a href="{{ route('usersM', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">Modificar</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <a class="btn btn-primary pull-right" href="register" role="button">Crear Usuario</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection