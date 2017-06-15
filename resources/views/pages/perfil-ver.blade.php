@extends('layouts.main_front')
@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Datos Personales</h4>
                    </div>
                    <div class="card-content">
                        <div>
                           <a href="{{route('cliente.perfil.verificar',['id'=> Auth::user()->id ] )}}">Ver o Agregar datos</a> 
                        </div>
                        {{-- <div>
                            <a href="{{route('cliente.perfil.ver',['id'=> Auth::user()->id ] )}}">Ver datos</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#name').on("keypress",function (key) {
                window.console.log(key.charCode)
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
            $('#lastname').on("keypress",function (key) {
                window.console.log(key.charCode)
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
           $('#registrar').click(function () {
                var pass = $('#password').val();
                if ($('#password-confirm').val() != pass){
                    alert('Las contraseña no coinciden');
                    $("#crear_user").submit(function(e){
                        return false;
                    });
                }else {
                    $("#crear_user").submit(function (e) {
                        return true;
                    });
                }
            });
        });
    </script>
@endsection

