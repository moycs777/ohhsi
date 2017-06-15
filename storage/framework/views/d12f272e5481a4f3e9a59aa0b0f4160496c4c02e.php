<?php $__env->startSection('content'); ?>
    <!--Producto-->
    <?php 
        $prod = substr($producto->ruta, 8);
    ?>  
    <div class="container" style="margin: 0 auto">
        <div class="producto">
                <div class="col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                    <div class="img_grande">
                        <img class="img-responsive" id="img_grande" src="<?php echo e(asset($prod)); ?>"  alt="<?php echo e($producto->titulo); ?>">
                    </div>
                    <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $ruta = substr($imagen->ruta, 8);
                     ?>                    
                        <div class="col-xs-3 col-md-3 minis">
                            <img id="img_pq" src="<?php echo e(asset($ruta)); ?>"  alt="<?php echo e($producto->titulo); ?>" data-image="<?php echo e(asset('img/products.png')); ?>" >
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="col-md-12 titulo_prod">
                        <h2 style="margin: 0 0 60px 0!important;"><strong><?php echo e($producto->titulo); ?></strong></h2>
                        <div class="col-md-9">
                            <p>Calificar este item:</p>
                            <h2 style="color: #e42a4d; margin: 60px 0 !important;"><strong>Precio: $ <?php echo e($producto->precio_venta); ?></strong></h2>
                        </div>
                        <div class="col-md-3">
                            <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                            <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                            <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                            <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                            <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                        </div>
                        <form class="form-horizontal" id="" role="form" method="POST" action="<?php echo e(route('producto.comprar' , ['id'=> Auth::user()->id])); ?>" method="post" id=""><?php echo e(csrf_field()); ?>

                            <div class="col-md-7">
                               <label for="">Cantidad disponible</label>
                               <input type="text"  disabled="disabled" style="width: 50px; margin-bottom: 10px;" value="<?php echo e($producto->cantidad); ?>">
                               <br>
                               <label for="">Cantidad a comprar</label>
                               <input type="number" name="cantidad" min="0" max="<?php echo e($producto->cantidad); ?>" style="width: 50px;" required>
                            </div>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-block btn-primary" value="COMPRAR">
                            </div>
                                <input type="hidden" name="precio" value="<?php echo e($producto->precio_venta); ?>">
                                <input type="hidden" name="id_producto_venta" value="<?php echo e($producto->id); ?>">
                        </form>
                    </div>
                </div>
                <div class="col-md-12" id="descripc">
                    <h4><strong>DESCRIPCION DEL PRODUCTO</strong></h4>
                    <p><?php echo $producto->descripcion; ?></p>
                </div>
        </div>
    </div>
    
    

    <?php if(!empty($producto->testimonio)): ?>
        <!--Middle Testimonios-->
        <div class="container-fluid">
            <div class="col-md-4">
                <hr id="linea_rec">
            </div>
            <div class="col-md-4 text-center">
                <h5>TESTIMONIOS</h5>

            </div>
            <div class="col-md-4">
                <hr id="linea_rec">
            </div>
        </div>
    <?php else: ?>
        
    <?php endif; ?>

    <div class="container-fluid" style="background-color: #e42a4d">
        <div class="row" style="margin: 30px 0;">
        <?php if(isset( $producto->testimonio )): ?>    
            <?php $__currentLoopData = $producto->testimonio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-8 col-md-4">
                    <div class="thumbnail">
                        <div class="row">
                            <div class="col-md-3" style="margin: 10% 0;">
                                <img id="usuario" class="img-thumbnail" src="<?php echo e(asset('img/usuario.png')); ?>" alt="...">
                                
                                <?php for($i = 0; $i <= $testimonio->estrellas-1; $i++): ?>
                                    <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                <?php endfor; ?>
                               
                            </div>
                            <div class="col-md-9">
                                <h4>Anonimo</h4>
                                <p style="float: center"><?php echo e($producto->testimonio[$loop->iteration-1]->opinion); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>    
            
        </div>
    </div>
    <!--Productos Recomendados-->
    <div class="container-fluid">
            <div class="middle" style="margin: 30px 0;">
                <div class="col-md-4">
                    <hr id="linea_rec">
                </div>
                <div class="col-md-4 text-center">
                    <h5>PRODUCTOS RECOMENDADOS</h5>
                </div>
                <div class="col-md-4">
                    <hr id="linea_rec">
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2" style="margin-top: 50px; text-align: center">
                <div class="row">
                    <?php if(isset($recomendaciones)): ?>
                        <?php $__currentLoopData = $recomendaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recomen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                                <?php 
                                    $recom_ruta = substr($recomen->imagen[0]->ruta, 8);
                                ?>
                                <a href="<?php echo e(route('ver.producto', ['slug' => $recomen->slug])); ?>"><img class="img-responsive" src="<?php echo e(asset($recom_ruta)); ?>" alt="..."></a>
                                <div class="hearts" style="margin: 2%;">
                                    <?php for($i = 0; $i <= $recomen->promedio-1; $i++): ?>
                                        <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                    <?php endfor; ?>
                                </div>
                                <div class="nombre" style="margin: 2%; padding: 0;  max-height: 40px; min-height: 40px;"><?php echo e($recomen->titulo); ?></div>
                                <div class="precio" style="margin: 2%; padding: 0;">$<?php echo e($recomen->precio_venta); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>    
                    
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/pages/producto.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>