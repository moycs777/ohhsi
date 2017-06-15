<?php
	Route::group(['prefix' => '/'], function () {
		Route::get('', 'HomeController@index')->name('inicio');
		Route::get('admin', 'PagesController@index');
		Auth::routes();
		Route::get('createUsers', function(){
			return view('admin.users.create');
		});
		Route::get('registrarse', function(){
			return view('pages.registrarse');
		});
		Route::get('asd', function(){
			return 'asd';
		})->name('asd');
	    
	});

	//Inicio despues del login
	Route::group(['prefix' => 'home'], function () {
	    Route::get('/', 'HomeController@index');
	    //Productos
	    Route::get('producto/{slug}', 'ComprasController@ver')->name('ver.producto');
	    Route::post('producto/comprar/{id}', 'ComprasController@comprar')->name('producto.comprar');
	    
	    Route::post('producto/calificar', 'ComprasController@calificar')->name('producto.calificacion');
	    // Perfil del cliente
	    Route::group(['prefix' => 'cliente'], function () {
	    	Route::get('perfil/{id}', 'HomeController@perfil')->name('cliente.perfil');
	    	
	    	Route::get('perfil/verificar/{id}', 'HomeController@verificar')->name('cliente.perfil.verificar');
	    	
	    	Route::post('perfil/grabar/{id}', 'HomeController@perfil_grabar')->name('perfil.grabar');
	    	Route::get('perfil-ver/{id}', 'HomeController@perfil_ver')->name('cliente.perfil.ver');
	    });
	    Route::group(['prefix' => 'blog'], function () {
	    	Route::get('ver/{slug}', 'HomeController@verPost')->name('blog.ver');
	    });

	    Route::group(['prefix' => 'categories'], function () {
	    	Route::get('{slug}', 'SearchController@categories')->name('categorias');
	    });
	    /*Route::get('compras/{slug}', function(){
			return 'compras'. $slug;
		})->name('asd');*/
	    Route::get('busqueda', 'SearchController@busqueda')->name('busqueda');
	    
	    
	});

	Route::group(['prefix' => 'categorias'], function () {
	    Route::get('/', 'CategoriasController@index');
	    //Buscra pro ajax
	    Route::get('categoriasPadres/{id}', 'CategoriasController@categoriasPadres');
	    //Guardar por ajax
	    Route::post('save', 'CategoriasController@save');
	});

	Route::group(['prefix' => 'categoriasBlog'], function () {
	    Route::get('/', 'CategoriasBlogController@index');
	    //Buscra pro ajax
	    Route::get('categoriasPadres/{id}', 'CategoriasBlogController@categoriasPadres');
	    //Guardar por ajax
	    Route::post('save', 'CategoriasBlogController@save');
	});
	// Blogs
	Route::group(['prefix' => 'blog'], function () {
	    Route::get('/', 'BlogController@index');
	    Route::get('publicar', 'BlogController@publicar');
	    //Busca por ajax
	    Route::get('catprodHijos/{id}', 'BlogController@catprodHijos');
	    Route::get('catprodNietos/{id}', 'BlogController@catprodNietos');
	    Route::get('ajax', 'BlogController@imagenes');
	    
	    Route::post('blogGuardar', 'BlogController@guardar');
	    Route::post('blogGuardarForm', 'BlogController@guardarForm');

		//eliminar blog
		Route::delete('delete/{slug}', 'BlogController@delete');
		Route::get('edit/{slug}', 'BlogController@editing');
	    Route::post('blog/img/delete', 'BlogController@deleteimg');
		
		Route::get('ver/{slug}', 'BlogController@ver');
		Route::get('index', 'BlogController@verIndex');
		Route::post('update/{id}', 'BlogController@update');
		//Eliminar Imagen
		Route::get('deleteImg/{id}', 'BlogController@deleteImg');
		Route::get('edit/deleteImg/{id}', 'BlogController@deleteImg');
	});
	
	Route::group(['prefix' => 'productos'], function () {
	    Route::get('/', 'ProductosController@index');
	    Route::get('publicar', 'ProductosController@publicar');
	    //Busca por ajax
	    Route::get('catprodHijos/{id}', 'ProductosController@catprodHijos');
	    Route::get('catprodNietos/{id}', 'ProductosController@catprodNietos');
	    Route::get('ajax', 'ProductosController@imagenes');
	    
	    Route::post('productosGuardar', 'ProductosController@guardar');
	    Route::post('productosGuardarForm', 'ProductosController@guardarForm');
		//Ver
		Route::get('ver/{slug}', 'ProductosController@ver');

		//eliminar producto
		Route::delete('delete/{id}', 'ProductosController@delete');
		//Eliminar Imagen
		Route::get('deleteImg/{id}', 'ProductosController@deleteImg');
		Route::get('edit/deleteImg/{id}', 'ProductosController@deleteImg');

		//editar
		Route::get('edit/{id}', 'ProductosController@edit');
		Route::post('update/{id}', 'ProductosController@update');

	});

	Route::get('users',['uses'        => 'UsersController@index'] )->name('admin.users');
	Route::get('users/create',['uses' => 'UsersController@create'] );
	Route::post('users',['uses'       => 'UsersController@store'] );
	Route::get('usersM/{id}',['uses'       => 'UsersController@modify'] )->name('usersM');
	Route::post('usersUpdate/{id}',['uses'       => 'UsersController@updateOrCreate'] )->name('admin.user.update');

	Route::get('register ', function(){
		return view('auth.register');
	});

	Route::get('logout', 'MainController@logout');
	Route::get('/home', 'HomeController@index');
	Route::post('registerp', 'MainController@register');
	
	

	Route::get('resultados', function(){
		return view('pages.resultado');
	});

	Route::group(['prefix' => 'despachos'], function () {
		Route::get('', 'DespachosController@index')->name('despachos');
		Route::get('ver/{id}', 'DespachosController@ver')->name('despachos.ver');
		Route::get('despachar/{id}', 'DespachosController@despachar')->name('despachos.despachar');		
	    
	});

	Route::get('/clientelogin', 'Auth\ClientesController@showLoginForm')->name('cliente.login');
	Route::get('/clientelogout', 'MainController@logout')->name('cliente.logout');
	//Route::get('/clientelogout', 'Auth\ClientesController@logout')->name('cliente.logout');
    Route::post('/clientelogin', 'Auth\ClientesController@login')->name('cliente.login.submit');
    Route::post('/clienteregister', 'Auth\ClientesController@register')->name('cliente.register.submit');

    Route::get('/clientelogin/{provider}', 'Auth\ClientesController@redirectToProvider');
	Route::get('/clientelogin/{provider}/callback', 'Auth\ClientesController@handleProviderCallback');
