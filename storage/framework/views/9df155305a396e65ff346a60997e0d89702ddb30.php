<?php $__env->startSection('title', 'Lista de Usuarios'); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red">
                            <h4 class="title">Lista de Usuarios</h4>
                        </div>
                        
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-danger">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th></th>

                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['lastname']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['estado']; ?></td>
                                        <td>
                                            <a href="<?php echo e(route('usersM', ['id' => $user->id])); ?>" class="btn btn-sm btn-primary">Modificar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <a class="btn btn-primary pull-right" href="register" role="button">Crear Usuario</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>