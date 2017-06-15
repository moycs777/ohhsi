<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top: 20px; padding: 0 6%;">
        <div class="row">
            <div class="col-md-12 text-center">
                
                

                
                <?php if(isset($categorias)): ?>
                    <button class="btn btn-primary" id="palabras" name="palabras">
                        Lubricante
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-primary" id="palabras" name="palabras">
                        Lubricar
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <hr id="linea_rec">
                <?php endif; ?>    
                
                <?php if( $alerta == true ): ?>
                    <div class="resultado">
                        <div style="float: left; padding: 0 34% 1% 19%;" id="encontrados">No fueron encontrados productos </div>
                        <div style="right: auto">
                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" id="icon_hr"></span>
                            <span class="glyphicon glyphicon-th" aria-hidden="true" id="icon_cuadros"></span>
                        </div>
                    </div>                    
                <?php endif; ?>
                <?php if( $alerta == false ): ?>
                    <div class="resultado">
                        <div style="float: left; padding: 0 34% 1% 19%;" id="encontrados">Fueron encontrados <?php echo e(count($productos)); ?> productos </div>
                        <div style="right: auto">
                            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" id="icon_hr"></span>
                            <span class="glyphicon glyphicon-th" aria-hidden="true" id="icon_cuadros"></span>
                        </div>
                    </div>                    
                <?php endif; ?>

            </div>
            
            
               <div class="col-sm-2 col-xs-12 text-center" id="categorias">
                    <h5>Todas las categorias</h5>
                    <hr id="linea_rec">
                    <ul style="padding: 0 !important;">
                        <?php $__currentLoopData = $categoriasAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoriaA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('categorias', ['slug' => $CategoriaA->slug])); ?>">
                                <li style="list-style: none"><?php echo e($CategoriaA->descripcion); ?></li></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        
                    </ul>
                </div>
               

           <?php if(isset($productos)): ?>
           <div class="col-sm-10 col-xs-12" id="busq_productos_horz">
                <div class="col-md-12">
                    
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" style="border: solid 1px #e42a4d; background: #ffffff; margin-bottom: 20px;">
                        
                        <?php 
                            $ruta = substr($producto->imagen[0]->ruta, 8);
                            $thumby = 'images/thumbs/' . substr($ruta, 7);
                        ?>
                        <div class="col-xs-6 col-md-2">
                            <a href="<?php echo e(route('ver.producto', ['slug' => $producto->slug])); ?> "><img class="img-responsive" src="<?php echo e(asset($thumby)); ?>" alt="<?php echo e($producto->titulo); ?>"></a>
                        </div>
                        <div class="col-md-5 text-left">
                            <div class="hearts" style="margin: 2%;">
                                <?php if(count($producto->calificacion) > 0 ): ?>       
                                    <?php for($i = 0; $i < $producto->calificacion; $i++): ?>
                                        <img id="hearts" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                    <?php endfor; ?>
                                <?php endif; ?>

                            </div>
                            <div class="nombre" style="margin: 2%; padding: 0;"><?php echo e($producto->titulo); ?></div>
                            <div class="precio" style="margin: 2%; padding: 0;"><?php echo e($producto->precio_venta); ?></div>
                        </div>
                        <div class="col-md-5 text-center">
                            <a href="<?php echo e(route('ver.producto', ['slug' => $producto->slug])); ?> " class="btn btn-default" style="margin-top: 10%;">Ver Producto</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php echo e($productos->links()); ?>


                </div>
            </div>
           <?php else: ?>
               <p>No hay productos</p>
           <?php endif; ?>

           <?php if(isset($productos)): ?>
               <div class="col-sm-10 col-xs-12" id="busq_productos"style="display: none;">
                    <div class="row">
                        <div class="col-md-3 col-xs-8">
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row" style="border: solid 1px #e42a4d; background: #ffffff; margin-bottom: 20px;">
                                <?php
                                $ruta = substr($producto->imagen[0]->ruta, 8);
                                $thumby = 'images/thumbs/' . substr($ruta, 7);
                                ?>
                                <a href="<?php echo e(route('ver.producto', ['slug' => $producto->slug])); ?> "><img class="img-responsive" src="<?php echo e(asset($thumby)); ?>" alt="<?php echo e($producto->titulo); ?>"></a>
                                <div class="col-md-5 text-left">
                                    <div class="hearts" style="margin: 2%;">
                                        <?php if(count($producto->calificacion) > 0 ): ?>
                                            <?php for($i = 0; $i < $producto->calificacion; $i++): ?>
                                                <img id="hearts" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                            <?php endfor; ?>
                                        <?php endif; ?>

                                    </div>
                                    <div class="nombre" style=""><?php echo e($producto->titulo); ?></div>
                                    <div class="precio" style=""><?php echo e($producto->precio_venta); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($productos->links()); ?>

                        </div>
                    </div>
                </div>
           <?php else: ?>
               <p>No hay productos</p>
           <?php endif; ?>


        </div>
    </div>
    <!--/Productos-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/pages/resultado.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>