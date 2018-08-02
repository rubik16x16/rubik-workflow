<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){

  return 'Hola mundo';

});

Route::middleware('adminAuth')->group(function(){

  Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    Route::get('/usuarios', 'Admin\UsuariosController@index')->name('admin.usuarios.index')->middleware('permiso:usuarios-lista');
    Route::get('/usuarios/create', 'Admin\UsuariosController@create')->name('admin.usuarios.create')->middleware('permiso:usuarios-agregar');
    Route::post('/usuarios', 'Admin\UsuariosController@store')->name('admin.usuarios.store')->middleware('permiso:usuarios-agregar');
    Route::get('/usuarios/{id}/edit', 'Admin\UsuariosController@edit')->name('admin.usuarios.edit')->middleware('permiso:usuarios-editar');
    Route::put('/usuarios/{id}', 'Admin\UsuariosController@update')->name('admin.usuarios.update')->middleware('permiso:usuarios-editar');
    Route::delete('/usuarios/{id}', 'Admin\UsuariosController@destroy')->name('admin.usuarios.destroy')->middleware('permiso:usuarios-eliminar');

    Route::get('/tipoherramientas', 'Admin\TipoHerramientasController@index')->name('admin.tipoHerramientas.index');
    Route::get('/tipoherramientas/create', 'Admin\TipoHerramientasController@create')->name('admin.tipoHerramientas.create');
    Route::post('/tipoherramientas', 'Admin\TipoHerramientasController@store')->name('admin.tipoHerramientas.store');
    Route::get('/tipoherramientas/{id}/edit', 'Admin\TipoHerramientasController@edit')->name('admin.tipoHerramientas.edit');
    Route::put('/tipoherramientas/{id}', 'Admin\TipoHerramientasController@update')->name('admin.tipoHerramientas.update');
    Route::delete('/tipoherramientas/{id}', 'Admin\TipoHerramientasController@destroy')->name('admin.tipoHerramientas.destroy');

    Route::get('/herramientas', 'Admin\HerramientasController@index')->name('admin.herramientas.index');
    Route::get('/herramientas/create', 'Admin\HerramientasController@create')->name('admin.herramientas.create');
    Route::post('/herramientas', 'Admin\HerramientasController@store')->name('admin.herramientas.store');
    Route::get('/herramientas/{id}/edit', 'Admin\HerramientasController@edit')->name('admin.herramientas.edit');
    Route::put('/herramientas/{id}', 'Admin\HerramientasController@update')->name('admin.herramientas.update');
    Route::delete('/herramientas/{id}', 'Admin\HerramientasController@destroy')->name('admin.herramientas.destroy');

		Route::get('/proyectos', 'Admin\ProyectosController@index')->name('admin.proyectos.index');
    Route::get('/proyectos/create', 'Admin\ProyectosController@create')->name('admin.proyectos.create');
    Route::post('/proyectos', 'Admin\ProyectosController@store')->name('admin.proyectos.store');
    Route::get('/proyectos/{id}/edit', 'Admin\ProyectosController@edit')->name('admin.proyectos.edit');
    Route::put('/proyectos/{id}', 'Admin\ProyectosController@update')->name('admin.proyectos.update');
		Route::get('/proyectos/{id}', 'Admin\ProyectosController@show')->name('admin.proyectos.show');
    Route::delete('/proyectos/{id}', 'Admin\ProyectosController@destroy')->name('admin.proyectos.destroy');

		Route::get('/proyectos/{id}/herramientas/create', 'Admin\ProyectoHerramientasController@createHerramientas')->name('admin.proyectos.herramientas.create');
		Route::post('/proyectos/{id}/herramientas/create', 'Admin\ProyectoHerramientasController@storeHerramientas')->name('admin.proyectos.herramientas.store');
		Route::get('/proyectos/{id}/herramientas/edit', 'Admin\ProyectoHerramientasController@editHerramientas')->name('admin.proyectos.herramientas.edit');
		Route::put('/proyectos/{id}/herramientas', 'Admin\ProyectoHerramientasController@updateHerramientas')->name('admin.proyectos.herramientas.update');

    Route::resource('/roles', 'Admin\RolesController', [
      'names'=> [
        'index'=> 'admin.roles.index',
        'create'=> 'admin.roles.create',
        'store'=> 'admin.roles.store',
        'edit'=> 'admin.roles.edit',
        'update'=> 'admin.roles.update',
        'destroy'=> 'admin.roles.destroy'
      ]
    ]);

    Route::get('/logout', function(){
      session()->forget('admin');

  		return redirect(route('admin.login.get'));

  	})->name('admin.logout');

  });

});

Route::middleware(['adminGuest'])->group(function(){

  Route::get('/admin/login', 'Admin\Auth\LoginController@get')->name('admin.login.get');
  Route::post('/admin/login', 'Admin\Auth\LoginController@post')->name('admin.login.post');

});
