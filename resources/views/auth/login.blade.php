@extends('layouts.index_login')

@section('content')
    <div class="container" id="fondo">
        <div class="row">        
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <div class="img-usuario">
                        <img src="{{asset('img/user.png')}}" style="margin: 20px 45%;" alt="img-user">
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="{{asset('img/iconuser.png')}}"></div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="{{asset('img/iconkey.png')}}"></div>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Olvide mi contraseña
                                </a>
                            </div>

                        </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                    <div class="iniciar" style="display: inline-block;">
                                           <button type="submit" class="btn btn-default" style="color: #e42a4d ">
                                               Iniciar
                                           </button>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
				
                {{--<div class="registrate" style="text-align: center; margin-top: 10px;">
                    <p style="display: inline-block; color: #000;">No estás registrado áun?</p> <a href="#"  style="display: inline-block; color: #FFF!important;">Registrate aquí</a>
                </div>
            </div>--}}
			
        </div>
        <div class="transparencia">
            <img src="{{asset('img/girl.png')}}"  id="girl" alt="img-user">
        </div>
    </div>
@endsection
