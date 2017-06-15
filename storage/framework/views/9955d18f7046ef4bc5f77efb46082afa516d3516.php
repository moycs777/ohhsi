<!--  NAVBAR -->
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand home" href="<?php echo e(url('/home')); ?>" data-animate-hover="bounce">
                <img src="<?php echo e(asset('img/logo-small.png')); ?>" alt="Ohh SI logo" class="hidden-xs">
                <img src="<?php echo e(asset('img/logo-small.png')); ?>" alt="Ohh SI logo" class="visible-xs"><span class="sr-only">Ohh SI ir a inicio</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">CATEGORIAS</span>
                    <i class="fa fa-align-justify"></i>
                </button>
            </div>
        </div>
        <!--/.navbar-header -->
        <div class="navbar-collapse collapse" id="navigation">
        
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">  CATEGORIAS <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <?php if(isset($categorias_index)): ?>
                                    <?php $__currentLoopData = $categorias_index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                        <div class="col-sm-3">
                                            <h5><?php echo e($categoria->descripcion); ?></h5>
                                            <ul>
                                                
                                                <?php $__currentLoopData = $sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_caty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <?php if($sub_caty->id_categoria_padre == $categoria->id): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('categorias', ['slug' => $sub_caty->slug])); ?>"><?php echo e($sub_caty->descripcion); ?></a>
                                                        </li>
                                                            <?php $__currentLoopData = $sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($lvl3->id_categoria_padre == $sub_caty->id): ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('categorias', ['slug' => $lvl3->slug])); ?>"><?php echo e($lvl3->descripcion); ?></a>
                                                                    </li>
                                                                <?php endif; ?>    
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    <?php endif; ?>  
                                    
                                    
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">  OFERTAS <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <?php if(isset($categorias_index)): ?>
                                    <?php $__currentLoopData = $categorias_index; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                        <div class="col-sm-3">
                                            <h5><?php echo e($categoria->descripcion); ?></h5>
                                            <ul>
                                                
                                                <?php $__currentLoopData = $sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_caty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <?php if($sub_caty->id_categoria_padre == $categoria->id): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('categorias', ['slug' => $sub_caty->slug])); ?>"><?php echo e($sub_caty->descripcion); ?></a>
                                                        </li>
                                                            <?php $__currentLoopData = $sub_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($lvl3->id_categoria_padre == $sub_caty->id): ?>
                                                                    <li>
                                                                        <a href="<?php echo e(route('categorias', ['slug' => $lvl3->slug])); ?>"><?php echo e($lvl3->descripcion); ?></a>
                                                                    </li>
                                                                <?php endif; ?>    
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    <?php endif; ?>  
                                    
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw">
                    <?php if(Auth::check()): ?>
                    
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Opciones
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(route('cliente.perfil', ['id' => 1])); ?> ">Mis datos</a></li>
                                <li><a href="<?php echo e(route('cliente.logout')); ?>">Salir <?php echo e(Auth::user()->email); ?></a></li>
                            </ul>

                            
                        </li>  
                    <?php else: ?>
                        <a href="<?php echo e(route('cliente.login')); ?>">Login</a><br>
                        <a href="<?php echo e(route('cliente.logout')); ?>">Register</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
        <div class="navbar-buttons">
            <form class="navbar-form navbar-right" role="search" action="<?php echo e(route('busqueda')); ?>" method="get">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="buscar">
                    <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
                
            </form>
            <!--/.nav-collapse -->
        </div>
        
    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

