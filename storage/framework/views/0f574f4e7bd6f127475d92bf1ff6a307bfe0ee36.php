<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <!--Blog-->            
            <div class="col-md-8 col-md-offset-2" style="padding: 0!important;">
                <?php 
                    $ruta = substr($post->ruta, 8);
                 ?>
                <img class="img-responsive" src="<?php echo e(asset($ruta)); ?>" alt="<?php echo e($post->titulo); ?>">
            </div>
            <div class="col-md-8 col-md-offset-2" style="background: #e42a4d; color: white; padding-bottom: 30px;">
                <div class="col-md-12 blog">
                    <h2 style="text-align: center"><?php echo e($post->titulo); ?></h2>
                    <div style="padding: 10px; margin: 0 5%; margin-bottom: 10px; width: auto!important;" class="columnas"><?php echo $post->descripcion; ?></div>
                </div>               
            </div>
            <!--/Blog-->
            <!--Productos-->            
            
        </div>
    </div>
    
    </div>
    <!--/Productos-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/pages/blog.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.main_front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>