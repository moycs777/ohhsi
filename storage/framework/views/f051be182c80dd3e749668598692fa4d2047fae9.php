<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Gracias por su compra!</h4>
                    </div>
                    <div class="card-content">
                        <form class="form-horizontal" id="crear_user" role="form" method="POST" action="<?php echo e(route('producto.calificacion' )); ?>" method="post" id=""><?php echo e(csrf_field()); ?>

                            <div class="row" style="padding: 0 65px;">
                                <h1>Ahora nos gustaria conocer su opinion!!</h1>
                                <div class="form-group <?php echo e($errors->has('nombre_contacto') ? ' has-error' : ''); ?> col-md-12">
                                    <label for="comment">Opinion o testimonio sobre el producto</label>
                                    <textarea class="form-control" rows="1" id="testimonio" name="testimonio"  required autofocus></textarea>
                                    <label for="calificacion">Puntuacion</label>
                                    <select class="form-control" id="calificacion" name="estrellas">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" id="registrar" style="float: right">Calificar</button>
                                </div>
                            </div>
                            <input type="hidden" id="id_producto_venta" name="id_producto_venta" value="<?php echo e($detalle->id_producto_venta); ?>"/>
                            <input type="hidden" id="id_compras_clientes" name="id_compras_clientes" value="<?php echo e($detalle->id_compras_clientes); ?>"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main_front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>