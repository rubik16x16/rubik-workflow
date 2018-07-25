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

    Route::resource('/usuarios', 'Admin\UsuariosController', [
      'names'=> [
        'index'=> 'admin.usuarios.index',
        'create'=> 'admin.usuarios.create',
        'store'=> 'admin.usuarios.store',
        'edit'=> 'admin.usuarios.edit',
        'update'=> 'admin.usuarios.update',
        'destroy'=> 'admin.usuarios.destroy'
      ]
    ]);

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
