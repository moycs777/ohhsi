<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Direccion e Informacion de Pago</h4>
                    </div>
                    <div class="card-content">
                    <?php if( isset($direccion->pais) ): ?>
                        <?php echo e($direccion->nombre_contacto); ?>

                    <?php endif; ?>
                        <?php if($dir == 0): ?>
                            <script type="text/javascript">
                                console.log('asdasd');
                                direccion();
                                function direccion(){
                                    alert('Debes inresar los datos de envio antes de comprar');
                                }
                            </script>
                        <?php endif; ?>
                        <form class="form-horizontal" id="crear_user" role="form" method="POST" action="<?php echo e(route('perfil.grabar' , ['id'=> Auth::user()->id])); ?>" method="post" id=""><?php echo e(csrf_field()); ?>

                                                  
                            <div class="form-group<?php echo e($errors->has('nombre_contacto') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label" style="font-size: 14px;">Nombre de contacto</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="nombre_contacto"
                                    <?php if( isset($direccion->nombre_contacto) ): ?>
                                        value="<?php echo e($direccion->nombre_contacto); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?> 
                                    

                                    
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('pais') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Pais</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="pais" 
                                    <?php if( isset($direccion->pais) ): ?>
                                        value="<?php echo e($direccion->pais); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>


                                    
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('direccion1') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Direccion 1</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="direccion1" 
                                    <?php if( isset($direccion->direccion1) ): ?>
                                        value="<?php echo e($direccion->direccion1); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                   
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('direccion2') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Direccion 2</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="direccion2" 
                                    <?php if( isset($direccion->direccion2) ): ?>
                                        value="<?php echo e($direccion->direccion2); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                   
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('estado') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Estado</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="estado" 
                                    <?php if( isset($direccion->estado) ): ?>
                                        value="<?php echo e($direccion->estado); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                   
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('ciudad') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Ciudad</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="ciudad" 

                                    <?php if( isset($direccion->ciudad) ): ?>
                                        value="<?php echo e($direccion->ciudad); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                   
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('telefono') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Telefono</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="telefono" 
                                    <?php if( isset($direccion->telefono) ): ?>
                                        value="<?php echo e($direccion->telefono); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                    
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('codigo_postal') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">Codigo postal</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="codigo_postal" 
                                    <?php if( isset($direccion->codigo_postal) ): ?>
                                        value="<?php echo e($direccion->codigo_postal); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>

                                    
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('payu_info') ? ' has-error' : ''); ?>">
                                <label for="lastname" class="col-md-4 control-label" style="font-size: 14px;">payu_info</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="payu_info" 
                                    <?php if( isset($direccion->payu_info) ): ?>
                                        value="<?php echo e($direccion->payu_info); ?>" required autofocus>
                                    <?php else: ?>
                                        value="" required autofocus>
                                    <?php endif; ?>
                                   
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="registrar">
                                        Guardar Datos
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            console.log('direccion');
            

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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>