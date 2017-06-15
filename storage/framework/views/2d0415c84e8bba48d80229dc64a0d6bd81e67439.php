<?php $__env->startSection('title', 'Posts'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Lista de Posts</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-danger">
                        <th>Id Post</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php if(count($posts) > 0): ?>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!-- Task Name -->
                                    <?php 
                                        $postimg = substr($post->ruta, 8);
                                        $thumby = 'images/thumbs/' . substr($postimg, 7);
                                    ?>
                                    <td class="table-text">
                                        <div name="posts" >  <?php echo e($post->id); ?></div>                                       
                                    </td>
                                    <td>
                                        <div name="posts" >  <?php echo e($post->titulo); ?></div>

                                    </td>
                                    <td>
                                        <div name="posts" ><?php echo $post->descripcion; ?></div>
                                    </td>
                                    <td>
                                        <div name="posts" >
                                            <img src="<?php echo e(asset($thumby)); ?>" width="50" height="50" alt="<?php echo e($post->titulo); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="blog/ver/<?php echo e($post->slug); ?>"><button>Ver post</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="blog/edit/<?php echo e($post->slug); ?>"><button>Editar Post</button></a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="blog/delete/<?php echo e($post->slug); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button class="btn btn-danger">Borrar post</button>
                                        </form>
                                    </td>
                                    <td>
                                       
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($posts->links()); ?>

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary pull-right" href="blog/publicar" role="button">Crear Post</a>
            <div class="clearfix"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>