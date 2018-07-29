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
