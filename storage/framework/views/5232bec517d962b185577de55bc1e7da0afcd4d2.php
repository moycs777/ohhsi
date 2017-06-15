<?php $__env->startSection('title', 'Despachos'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Despachos</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Producto</th>
                        <th>Fecha de compra</th>
                        <th>Estatus(Despacho)</th>
                        <th>Monto</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php if(count($ventas) > 0): ?>
                            <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div name="posts" >  <?php echo e($venta->name); ?></div>                                       
                                    </td>
                                    <td>
                                        <div name="ventas" >  <?php echo e($venta->lastname); ?></div>

                                    </td>
                                    <td>
                                        <div name="ventas" ><?php echo $venta->titulo; ?></div>
                                    </td>
                                    <td>
                                        <div name="ventas" ><?php echo $venta->fecha_compra; ?></div>
                                    </td>
                                    <td>
                                        <div name="ventas" >
                                            
                                            <?php if($venta->despacho == false): ?>
                                                <p>Sin despachar</p>
                                            <?php elseif($venta->despacho == true): ?>
                                                <p style="color: #ef5350;">Despachado</p>  
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    
                                    
                                     <td>
                                        <div name="ventas" ><?php echo $venta->monto_compra; ?></div>
                                    </td>

                                    <td>
                                        <?php if($venta->despacho == false): ?>
                                            <a class="btn btn-primary pull-right" href="<?php echo e(route('despachos.ver', ['id'=> $venta->id])); ?>" role="button">Ir a Despachar</a>

                                            
                                        <?php else: ?>
                                            <a class="btn btn-primary pull-right" href="<?php echo e(route('despachos.ver', ['id'=> $venta->id])); ?>" role="button">Ver detalle</a>
                                              
                                        <?php endif; ?>
                                        
                                       
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>