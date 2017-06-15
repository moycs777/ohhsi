<!--  NAVBAR -->
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand home" href="{{ url('/home') }}" data-animate-hover="bounce">
                <img src="{{asset('img/logo-small.png')}}" alt="Ohh SI logo" class="hidden-xs">
                <img src="{{asset('img/logo-small.png')}}" alt="Ohh SI logo" class="visible-xs"><span class="sr-only">Ohh SI ir a inicio</span>
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
        {{-- {{$categoriasIndex}} --}}
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">  CATEGORIAS <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    @isset($categorias_index)
                                    @foreach($categorias_index as $categoria)                                
                                        <div class="col-sm-3">
                                            <h5>{{$categoria->descripcion}}</h5>
                                            <ul>
                                                {{-- @for($i = 1; $i < 2; $i ++) --}}
                                                @foreach($sub_cat as $sub_caty)
                                                    
                                                    @if($sub_caty->id_categoria_padre == $categoria->id)
                                                        <li>
                                                            <a href="{{ route('categorias', ['slug' => $sub_caty->slug]) }}">{{$sub_caty->descripcion}}</a>
                                                        </li>
                                                            @foreach($sub_cat as $lvl3)
                                                                @if($lvl3->id_categoria_padre == $sub_caty->id)
                                                                    <li>
                                                                        <a href="{{ route('categorias', ['slug' => $lvl3->slug]) }}">{{$lvl3->descripcion}}</a>
                                                                    </li>
                                                                @endif    
                                                            @endforeach
                                                    @endif
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    @endforeach  
                                    @endisset  
                                    
                                    {{-- <div class="col-sm-3">
                                        <h5>Featured</h5>
                                        <ul>
                                            <li><a href="category.html">T-shirts</a>
                                            </li>
                                            <li><a href="category.html">Shirts</a>
                                            </li>
                                            <li><a href="category.html">Pants</a>
                                            </li>
                                            <li><a href="category.html">Accessories</a>
                                            </li>
                                        </ul>
                                        <h5>Looks and trends</h5>
                                        <ul>
                                            <li><a href="category.html">T-shirts</a>
                                            </li>
                                            <li><a href="category.html">Shirts</a>
                                            </li>
                                            <li><a href="category.html">Pants</a>
                                            </li>
                                            <li><a href="category.html">Accessories</a>
                                            </li>
                                        </ul>
                                    </div> --}}
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
                                    @isset($categorias_index)
                                    @foreach($categorias_index as $categoria)                                
                                        <div class="col-sm-3">
                                            <h5>{{$categoria->descripcion}}</h5>
                                            <ul>
                                                {{-- @for($i = 1; $i < 2; $i ++) --}}
                                                @foreach($sub_cat as $sub_caty)
                                                    
                                                    @if($sub_caty->id_categoria_padre == $categoria->id)
                                                        <li>
                                                            <a href="{{ route('categorias', ['slug' => $sub_caty->slug]) }}">{{$sub_caty->descripcion}}</a>
                                                        </li>
                                                            @foreach($sub_cat as $lvl3)
                                                                @if($lvl3->id_categoria_padre == $sub_caty->id)
                                                                    <li>
                                                                        <a href="{{ route('categorias', ['slug' => $lvl3->slug]) }}">{{$lvl3->descripcion}}</a>
                                                                    </li>
                                                                @endif    
                                                            @endforeach
                                                    @endif
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    @endforeach  
                                    @endisset  
                                    
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw">
                    @if (Auth::check())
                    {{-- {{ Auth::user()}} --}}
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Opciones
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('cliente.perfil', ['id' => 1]) }} ">Mis datos</a></li>
                                <li><a href="{{ route('cliente.logout') }}">Salir {{ Auth::user()->email }}</a></li>
                            </ul>

                            
                        </li>  
                    @else
                        <a href="{{ route('cliente.login') }}">Login</a><br>
                        <a href="{{ route('cliente.logout') }}">Register</a>
                    @endif
                </li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
        <div class="navbar-buttons">
            <form class="navbar-form navbar-right" role="search" action="{{route('busqueda')}}" method="get">
                {{ csrf_field() }}
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

