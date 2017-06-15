
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ohh Si</title>
    <link href="<?php echo e(asset('plugin/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugin/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="styleshee">
    <link href="<?php echo e(asset('css/estilo.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.default.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugin/material/css/material-dashboard.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('css/estilo.css')); ?>" rel="stylesheet"/>
</head>
<body>
    <?php echo $__env->make('pages.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('pages.partials.redes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('pages.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
<!-- *** SCRIPTS TO INCLUDE ***-->
<script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugin/bootstrap/js/bootstrap.js')); ?>"></script>
<!--Script Costum-->
<?php echo $__env->yieldContent('script'); ?>
</html>
