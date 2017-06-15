@extends('admin.main')

@section('title', 'Crear Usuario')

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Crear Usuario</h4>
                            <p class="category">Complete el formulario</p>
                        </div>
                        <div class="card-content">
                            <form>
                                {!! Form::open(['action' => 'UsersController@store', 'method' => 'post']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                                                {!! Form::text('name', null, ['class' => 'form-control', 'require']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                {!! Form::label('lastname', 'Apellido', ['class' => 'control-label']) !!}
                                                {!! Form::text('lastname', null, ['class' => 'form-control', 'require']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                                                {!! Form::password('password', ['class' => 'form-control', 'require']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
                                                {!! Form::email('email', null, ['class' => 'form-control', 'require']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::submit('Registrar', ['class' => 'btn btn-primary pull-right']) !!}
                                    <div class="clearfix"></div>
                                {!! Form::close() !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection