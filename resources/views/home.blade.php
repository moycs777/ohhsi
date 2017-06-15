@extends('admin.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Bienvenido!<br> {{ Auth::user()->name }} <span class="caret"></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
