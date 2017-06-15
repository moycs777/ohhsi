<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Productos</h4>
                </div>
                <?php if(isset($messages)): ?>
                    <li style="color:black !important;"><?php echo e($messages); ?></li>
                <?php endif; ?>
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php if(count($totalProductos) > 0): ?>
                            <?php $__currentLoopData = $totalProductos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!-- Task Name -->
                                    <?php 
                                        $prod = substr($producto->ruta, 8);
                                        $thumby = 'images/thumbs/' . substr($prod, 7);
                                    ?>  
                                    <td class="table-text">
                                        <div name="producto" value="<?php echo $producto->id; ?>">  <?php echo e($producto->titulo); ?></div>                                       
                                    </td>
                                    <td>
                                        <div name="producto" value="<?php echo $producto->id; ?>">$  <?php echo e($producto->precio_venta); ?></div>
                                    </td>
                                    <td>
                                        <div name="producto" value="<?php echo $producto->id; ?>">  <?php echo e($producto->cantidad); ?> </div>
                                    </td>
                                    <td>
                                        <div name="producto" value="<?php echo $producto->id; ?>">
                                            <img src="<?php echo e(asset($thumby)); ?>" width="50" height="50" alt="<?php echo e($producto->titulo); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            <a href="productos/ver/<?php echo e($producto->slug); ?>"><button>Ver Producto</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            <a href="productos/edit/<?php echo e($producto->slug); ?>"><button >Editar Producto</button></a>
                                        </div>
                                    </td>

                                    <td>
                                        
                                    </td>
                                    <td>
                                        <form class="delete" action="<?php echo e(url('productos/delete', $producto->slug)); ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                            <input class="btn btn-danger" type="submit" value="Borrar Producto">
                                            
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $totalProductos->render(); ?>

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary pull-right" href="productos/publicar" role="button">Crear Producto</a>
            <div class="clearfix"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src=<?php echo e(asset('js/admin/listado_productos.js')); ?> type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>