@extends('layouts.main_front')
@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Gracias por su compra!</h4>
                    </div>
                    <div class="card-content">
                        <h1>Ahora nos gustaria conocer su opinion!!</h1>
                        
                    </div>
                    <form class="form-horizontal" id="crear_user" role="form" method="POST" action="{{route('producto.calificacion' )}}" method="post" id="">{{ csrf_field() }}
                                                  
                            <div class="form-group{{ $errors->has('nombre_contacto') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label" style="font-size: 14px;">Opinion o testimonio sobre el producto</label>

                                <div class="col-md-6">
                                    <input id="testimonio" type="text" class="form-control" name="testimonio"  required autofocus>

                                    
                                </div>
                            </div>

                            <label for="calificacion" class="col-md-12 control-label" style="font-size: 14px;">Puntuacion</label>
                                    
                            <div class="form-group">
                                <select name="calificacion" class="form-control" id="categoria_padre" required >
                                    <option>Seleccione</option>
                                    
                                        <option value="1" id="calificacion"></option>
                                        <option value="2" id="calificacion"></option>
                                        <option value="3" id="calificacion"></option>
                                        <option value="4" id="calificacion"></option>
                                        <option value="5" id="calificacion"></option>
                                
                                </select>
                            </div>

                            
                           

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="registrar">
                                        Guardar Direccion
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" id="id_producto_venta" name="id_producto_venta" value=""/>
                            <input type="hidden" id="id_compras_clientes" name="id_compras_clientes" value=""/>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection


