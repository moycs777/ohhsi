
 <!-- CAROUSEL-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo e(asset('img/banners/banner10.jpg')); ?>" class="img-responsive" alt="Ohh SI 1">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/banners/banner20.jpg')); ?>" class="img-responsive" alt="Ohh SI 2">
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/banners/banner30.jpg')); ?>" class="img-responsive" alt="Ohh SI 3">
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
<!-- /Carousel-->
