<?php $__env->startSection('title', 'Publicar Producto'); ?>

<?php $__env->startSection('css'); ?>
    <!--  Dropzone CSS    -->
    <link href="<?php echo e(asset('plugin/dropzone/css/dropzone.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/froala_editor.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/froala_editor.pkgd.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/plugins/line_breaker.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/plugins/char_counter.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/plugins/code_view.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/plugins/special_characters.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('plugin/froala/css/plugins/special_characters.css')); ?>" rel="stylesheet"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding-bottom: 30px;">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title">Publicador de Productos</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="<?php echo e(url('productos/productosGuardar')); ?>" method="post" class="dropzone" id="my-awesome-dropzone" style="border: none !important; margin-top: 25px;">
                                    <p style="margin: 0 auto; text-align: center">Haz click en la imagen para agregar mas imagenes</p><br>
                                    <img src="<?php echo e(asset('img/imagen.png')); ?>" class="img-responsive" alt="imagen" style="width: 20%; margin: 0 auto;">
                                    <div class="dz-default dz-message">
                                        Click aqui!
                                    </div>
                                    <div class="dropzone-previews"></div>
                                </form>
                            </div>
                            <!--End col-md-4-->
                            <div class="col-md-8">
                                <form action="<?php echo e(url('productos/productosGuardarForm')); ?>" method="post" id="myform">
                                    
                                    <?php if(isset($messages)): ?>
                                        <li style="color:black !important;"><?php echo e($messages); ?></li>
                                    <?php endif; ?>
                                    <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <label for="categoria" class="col-md-12 control-label" style="font-size: 14px;">Categoría</label>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_padre" required>
                                            <option>Seleccione</option>
                                            <?php $__currentLoopData = $categorias_padres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($categoria->id); ?>" id="option_padre"><?php echo e($categoria->descripcion); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="categoria_hijo" required>
                                            <option>Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="id_categoria_producto" class="form-control" id="categoria_nieto" required>
                                            <option>Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="padding: 0; margin: 0">
                                        <label for="" class="col-sm-2 control-label" style="font-size: 14px;">Título</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control" required autofocus>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding: 0; margin: 0">
                                        <label for="" class="col-sm-2 control-label" style="font-size: 14px;">Precio</label>
                                        <input type="text" class="form-control" name="precio_venta" id="precio" data-a-sign="$" data-a-dec="," data-a-sep="." placeholder="">
                                    </div>
                                    <div class="col-md-6 form-group" style="padding: 0; margin: 0">
                                        <label for="" class="col-sm-2 control-label" style="font-size: 14px;">Cantidad</label>
                                        <input type="number" name="cantidad" min="0" class="form-control" required autofocus>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <textarea name="descripcion">Descripcion del producto.</textarea>
                                        <script src="HTTP://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zaxjpord1sh4qv9bknisreuduh2kcthyj3niih2r1zvfejuu"></script> 
                                        <script>
                                            tinymce.init({ selector:'textarea',plugins: [
                                                "advlist autolink lists link charmap print preview hr anchor pagebreak",
                                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                                "insertdatetime media nonbreaking save table contextmenu directionality",
                                                "emoticons template paste textcolor colorpicker textpattern"
                                              ], color_picker_callback: function(callback, value) {callback('#ff0043');
                                                 },
                                                
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="validar">Publicar Producto</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End col-md-8-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    !--  Dropzone JS    -->
    <script src=<?php echo e(asset('plugin/dropzone/js/dropzone.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/froala_editor.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/froala_editor.pkgd.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/font_family.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/font_size.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/inline_style.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/line_breaker.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/link.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/lists.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/paragraph_format.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/paragraph_style.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugin/froala/js/plugins/print.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('js/autoNumeric.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('js/admin/producto.js')); ?> type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>