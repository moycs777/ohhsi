<?php $__env->startSection('content'); ?>
    <div class="container" id="fondo">
        <div class="row">        
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <div class="img-usuario">
                        <img src="<?php echo e(asset('img/user.png')); ?>" style="margin: 20px 45%;" alt="img-user">
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="<?php echo e(asset('img/iconuser.png')); ?>"></div>
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                                </div>
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="<?php echo e(asset('img/iconkey.png')); ?>"></div>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </div>

                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                                    Olvide mi contraseña
                                </a>
                            </div>

                        </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                        </label>
                                    </div>
                                    <div class="iniciar" style="display: inline-block;">
                                           <button type="submit" class="btn btn-default" style="color: #e42a4d ">
                                               Iniciar
                                           </button>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
				
                
			
        </div>
        <div class="transparencia">
            <img src="<?php echo e(asset('img/girl.png')); ?>"  id="girl" alt="img-user">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>