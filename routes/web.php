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

Route::get('/admin', 'Admin\AdminController@index')->name('admin.index');

Route::resource('admin/usuarios', 'Admin\UsuariosController', [
  'names'=> [
    'index'=> 'admin.usuarios.index',
    'create'=> 'admin.usuarios.create',
    'store'=> 'admin.usuarios.store',
    'edit'=> 'admin.usuarios.edit',
    'update'=> 'admin.usuarios.update',
    'destroy'=> 'admin.usuarios.destroy'
  ]
]);
