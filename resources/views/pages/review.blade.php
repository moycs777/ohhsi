@extends('layouts.main_front')

@section('content')
<div class="container">
    <div class="row form-group" style="padding: 40px;">
        <form action="" >
            <div class="col-md-8">
                <h4>Cuentenos su experiencia!</h4>
                <textarea class="form-control" name="" id="" cols="10" rows="10"></textarea>
            </div>
            <div class="col-md-4 text-center">
                <h4>Por favor, califique el producto!</h4>
                <div class="corazones" style="padding: 50px;">
                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                    <img id="corazon" src="{{asset('img/corazon.png')}}" alt="">
                </div>
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('js/pages/reviews.js')}}"></script>
@endsection
