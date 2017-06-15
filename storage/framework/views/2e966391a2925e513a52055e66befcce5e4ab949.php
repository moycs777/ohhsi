<?php $__env->startSection('title', 'Informacion del despacho'); ?>

<?php $__env->startSection('css'); ?>
    <!--  Chartist SASS    -->
    <link href="<?php echo e(asset('plugin/chartist/sass/_chartist.scss')); ?>" rel="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Informacion del envio</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                               <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Fecha de compra</th>
                                        <th>Estatus(Despacho)</th>
                                        <th>Monto</th>
                                        <th></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        
                                                <tr>
                                                    <!-- Task Name -->
                                                    <td class="table-text">
                                                        <div name="posts" >
                                                            <img src="http://localhost/ohhsi.<?php echo e($venta[0]->ruta); ?>" width="50" height="50" alt="<?php echo e($venta[0]->titulo); ?>">
                                                        </div>                                      
                                                    </td>
                                                    <td class="table-text">
                                                        <div name="posts" >  <?php echo e($venta[0]->name); ?></div>                                       
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >  <?php echo e($venta[0]->lastname); ?></div>

                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->titulo; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->cantidad; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->precio_venta; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->fecha_compra; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >
                                                            
                                                            <?php if($venta[0]->despacho == false): ?>
                                                                <p>Sin despachar</p>
                                                            <?php elseif($venta[0]->despacho == true): ?>
                                                                <p style="color: #ef5350;">Despachado</p>  
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                     <td>
                                                        <div name="ventas" ><?php echo $venta[0]->monto_compra; ?></div>
                                                    </td>
                                                    <td>                                                        
                                                    </td>

                                                </tr>
                                            
                                        </tbody>
                                    </table>

                                </div>       

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <th>Nombre de contacto </th>
                                        <th>Pais</th>
                                        <th>Estado</th>
                                        <th>Ciudad</th>
                                        <th>Direccion 1</th>
                                        <th>Direccion 2</th>
                                        <th>Codigo Postal</th>
                                        <th>Telefono</th>
                                        </thead>
                                        <tbody>
                                        
                                                <tr>
                                                    <!-- Task Name -->
                                                    <td class="table-text">
                                                       <div name="posts" >  <?php echo e($venta[0]->nombre_contacto); ?></div>                                       
                                                    </td>
                                                    <td class="table-text">
                                                        <div name="posts" >  <?php echo e($venta[0]->pais); ?></div>                                       
                                                    </td>
                                                    <td>
                                                        <div name="ventas" >  <?php echo e($venta[0]->estado); ?></div>

                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->ciudad; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->direccion1; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->direccion2; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->codigo_postal; ?></div>
                                                    </td>
                                                    <td>
                                                        <div name="ventas" ><?php echo $venta[0]->telefono; ?></div>
                                                    </td>                                                    

                                                    <td>
                                                        <?php if($venta[0]->despacho == false): ?>
                                                            <a class="btn btn-primary pull-right" href="<?php echo e(route('despachos.despachar', ['id'=> $venta[0]->id])); ?>" role="button">Despachar</a>

                                                            
                                                        <?php else: ?>
                                                            <a class="btn btn-primary pull-right" href="<?php echo e(route('despachos')); ?>" role="button">Atras</a>
                                                              
                                                        <?php endif; ?>
                                                        
                                                      
                                                    </td>

                                                </tr>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card" style="margin-top: 20px !important;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
            <script src=<?php echo e(asset('plugin/chartist/js/chartist.min.js')); ?> type="text/javascript"></script>
            <script src=<?php echo e(asset('js/admin/estadisticas.js')); ?> type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>