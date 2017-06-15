<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            
            <!--Blog-->
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <br/>
                <?php 
                    $ruta_post = substr($post->imagen[0]->ruta, 8);
                    $thumby = 'images/thumbs/' . substr($ruta_post, 7);
                ?>
                <?php if($loop->iteration == 1): ?>
                     <div class="col-md-10 col-md-offset-2" style="background: orange; color: white; margin-bottom: 2%; padding-bottom: 30px;">
                        <div class="blog1 col-md-10" style="margin-top: 30px;">
                            <div class="col-md-2" id="side_image">
                                <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas"><img class="img-responsive" src="<?php echo e(asset($thumby)); ?>" alt="<?php echo e($post->titulo); ?>" > 
                                
                                </a>
                            </div>
                            <div class="col-md-4" style="width: 600px;">
                                <h2 id="titulo_blog"><?php echo e($post->titulo); ?></h2>
                                <div style="padding: 10px;" class="columnas"><?php echo $post->descripcion; ?></div>
                            </div>
                            <div class="col-md-12 text-right" style="padding-right: 7%;">
                                <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                    <br/>
                <?php elseif($loop->iteration == 2): ?>
                     <div class="col-md-10" style="background: darkviolet; color: white; padding-left: 5%; margin-bottom: 2%; padding-bottom: 30px;">
                        <div class="blog2 col-md-10 col-md-offset-2" style="margin-top: 30px;">
                            <div class="col-md-4" style="width: 600px;">
                                <h2 id="titulo_blog"><?php echo e($post->titulo); ?></h2>
                                <p style="padding: 10px;" class="columnas"><?php echo $post->descripcion; ?></p>
                            </div>
                            <div class="col-md-2" id="side_image">
                                <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas"><img class="img-responsive" src="<?php echo e(asset($thumby)); ?>" alt="<?php echo e($post->titulo); ?>" ></a>
                            </div>
                        </div>
                        <div class="col-md-12 text-right" style="padding-right: 7%;">
                            <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas">
                                    Ver más
                            </a>
                        </div>
                    </div>
                <?php elseif($loop->iteration == 3): ?> 
                    <div class="col-md-8 col-md-offset-2" style="padding: 0!important;">
                        <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas"><img class="img-responsive" src="<?php echo e(asset($ruta_post)); ?>" alt="<?php echo e($post->titulo); ?>"></a>
                            </div>
                            <div class="col-md-8 col-md-offset-2" style="background: #e42a4d; color: white; padding-bottom: 30px;">
                                <div class="col-md-12 blog">
                                    <h2 style="text-align: center"><?php echo e($post->titulo); ?></h2>
                                    <div style="padding: 10px; margin: 0 5%; margin-bottom: 10px; width: auto!important;" class="columnas"><?php echo $post->descripcion; ?></div>
                                </div>
                                <div class="col-md-12 text-right" style="padding-right: 7%;">
                                    <a href="<?php echo e(route('blog.ver', ['slug' => $post->slug])); ?>" id="vmas">
                                    Ver más
                                    </a>
                            </div>
                    </div>
                <?php endif; ?>    
            

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--/Blog-->            
            <!--Productos-->

            <div class="col-md-10 col-md-offset-2" style="margin-top: 50px; text-align: center">
                <div class="row">
                    <?php if(isset($productos_4)): ?>
                     <?php 
                        //echo  $productos_4;    
                    ?>
                    <?php $__currentLoopData = $productos_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <?php 
                            $ruta = substr($p4->imagen[0]->ruta, 8);
                            $thumby = 'images/thumbs/' . substr($ruta, 7);
                        ?>
                        <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                            <a href="home/producto/<?php echo e($p4->slug); ?>"><img class="img-responsive" src="<?php echo e(asset($thumby)); ?>" alt="<?php echo e($p4->titulo); ?>"></a>
                            

                            <div class="hearts" style="margin: 2%;">
                            <?php if(count($calificacion_4) > 0 ): ?>       
                                <?php for($i = 0; $i < $calificacion_4[$loop->iteration-1]; $i++): ?>
                                    <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                <?php endfor; ?>
                            <?php endif; ?>
                            
                                
                                
                            </div>

                            <div class="nombre" style="margin: 2%; padding: 0; max-height: 40px; min-height: 40px;"><?php echo e($p4->titulo); ?></div>
                            <div class="precio" style="margin: 2%; padding: 0;">$<?php echo e($p4->precio_venta); ?></div>
                            <div >
                                <a href="home/producto/<?php echo e($p4->slug); ?>"><button>Ver Producto</button></a>
                            </div>
                        </div>
                    

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                       
                    
                </div>
            </div>
            <!--Productos-->
            <?php if(count($productos_restantes)>0): ?>                
                    <div class="col-md-12 text-center">
                        <div style="cursor:pointer; margin-top: 50px;" id="vermas">Ver más</div>
                    </div>  
            <?php endif; ?>

        </div>
    </div>
    <div class="container-fluid" style="margin-top: 50px; background-color: #FFFFFF">
        <div class="col-md-10 col-md-offset-2" id="masproductos" style="display: none;  padding: 50px 0; ">
            <div class="row">
            <?php if(count($productos_restantes)>0): ?>
                <?php $__currentLoopData = $productos_restantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php 
                        $p_ruta = substr($p->imagen[0]->ruta, 8);
                    ?>
                     <div class="col-xs-8 col-md-2 thumbnail" id="thumb_prod">
                        <a href="home/producto/<?php echo e($p->slug); ?>"><img class="img-responsive" src="<?php echo e(asset($p_ruta)); ?>" alt="<?php echo e($p->titulo); ?>"></a>
                        
                         <div class="hearts" style="margin: 2%;">
                            
                            <!-- <?php if(count($calificacion_r) > 0 ): ?>       
                                <?php for($i = 4; $i < $calificacion_r[$loop->iteration-1]; $i++): ?>
                                    <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                                <?php endfor; ?>
                            <?php elseif(count($calificacion_r) < 0 ): ?>
                                nada
                            <?php endif; ?> -->
                            <?php for($i = 0; $i <= $p->promedio-1; $i++): ?>
                                <img id="corazon" src="<?php echo e(asset('img/corazon.png')); ?>" alt="">
                            <?php endfor; ?>
                               
                        </div>
                        <div class="nombre" style="margin: 2%; padding: 0;"><?php echo e($p->titulo); ?></div>
                        <div class="precio" style="margin: 2%; padding: 0;">$<?php echo e($p->precio_venta); ?></div>
                        <div >
                            <a href="home/producto/<?php echo e($p->slug); ?>"><button>Ver Producto</button></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>

            <div class="row">
                
                            
                   
            </div>
            
                
        

        </div>
    </div>
    <!--/Productos-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/pages/blog.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>