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

  		return redirect(route('admin.login.get'));

});


Route::middleware('adminAuth')->group(function(){

  Route::prefix('/admin')->group(function(){

    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

		// Usuarios

    Route::get('/usuarios', 'Admin\UsuariosController@index')
		->name('admin.usuarios.index')
		->middleware('permiso:usuarios-lista');

		Route::get('/usuarios/create', 'Admin\UsuariosController@create')
		->name('admin.usuarios.create')
		->middleware('permiso:usuarios-agregar');

		Route::post('/usuarios', 'Admin\UsuariosController@store')
		->name('admin.usuarios.store')
		->middleware('permiso:usuarios-agregar');

		Route::get('/usuarios/{id}/edit', 'Admin\UsuariosController@edit')
		->name('admin.usuarios.edit')
		->middleware('permiso:usuarios-editar');

		Route::put('/usuarios/{id}', 'Admin\UsuariosController@update')
		->name('admin.usuarios.update')
		->middleware('permiso:usuarios-editar');

		Route::delete('/usuarios/{id}', 'Admin\UsuariosController@destroy')
		->name('admin.usuarios.destroy')
		->middleware('permiso:usuarios-eliminar');

		// Herramientas

    Route::get('/herramientas', 'Admin\HerramientasController@index')
		->name('admin.herramientas.index')
		->middleware('permiso:herramientas-lista');

    Route::get('/herramientas/create', 'Admin\HerramientasController@create')
		->name('admin.herramientas.create')
		->middleware('permiso:herramientas-agregar');

    Route::post('/herramientas', 'Admin\HerramientasController@store')
		->name('admin.herramientas.store')
		->middleware('permiso:herramientas-agregar');

    Route::get('/herramientas/{id}/edit', 'Admin\HerramientasController@edit')
		->name('admin.herramientas.edit')
		->middleware('permiso:herramientas-editar');

    Route::put('/herramientas/{id}', 'Admin\HerramientasController@update')
		->name('admin.herramientas.update')
		->middleware('permiso:herramientas-editar');

    Route::delete('/herramientas/{id}', 'Admin\HerramientasController@destroy')
		->name('admin.herramientas.destroy')
		->middleware('permiso:herramientas-eliminar');

		//Proyectos

		Route::get('/proyectos', 'Admin\ProyectosController@index')
		->name('admin.proyectos.index')
		->middleware('permiso:proyectos-lista');

    Route::get('/proyectos/create', 'Admin\ProyectosController@create')
		->name('admin.proyectos.create')
		->middleware('permiso:proyectos-agregar');

    Route::post('/proyectos', 'Admin\ProyectosController@store')
		->name('admin.proyectos.store')
		->middleware('permiso:proyectos-agregar');

    Route::get('/proyectos/{id}/edit', 'Admin\ProyectosController@edit')
		->name('admin.proyectos.edit')
		->middleware('permiso:proyectos-editar');

    Route::put('/proyectos/{id}', 'Admin\ProyectosController@update')
		->name('admin.proyectos.update')
		->middleware('permiso:proyectos-editar');

		Route::get('/proyectos/{id}', 'Admin\ProyectosController@show')
		->name('admin.proyectos.show')
		->middleware('permiso:proyectos-ver');

    Route::delete('/proyectos/{id}', 'Admin\ProyectosController@destroy')
		->name('admin.proyectos.destroy')
		->middleware('permiso:proyectos-eliminar');

		// Proyecto -> Herramientas

		Route::get('/proyectos/{id}/herramientas/create', 'Admin\Proyecto\HerramientasController@create')
		->name('admin.proyecto.herramientas.create')
		->middleware('permiso:proyectos-asignarHerramientas');

		Route::post('/proyectos/{id}/herramientas/create', 'Admin\Proyecto\HerramientasController@store')
		->name('admin.proyecto.herramientas.store')
		->middleware('permiso:proyectos-asignarHerramientas');

		Route::get('/proyectos/{id}/herramientas/edit', 'Admin\Proyecto\HerramientasController@edit')
		->name('admin.proyecto.herramientas.edit')
		->middleware('permiso:proyectos-editarHerramientas');

		Route::get('/proyectos/{id}/herramientas/check', 'Admin\Proyecto\HerramientasController@check')
		->name('admin.proyecto.herramientas.check')
		->middleware('permiso:proyectos-editarHerramientas');


		Route::put('/proyecto/{id}/herramientas', 'Admin\Proyecto\HerramientasController@update')
		->name('admin.proyectos.herramientas.update')
		->middleware('permiso:proyectos-editarHerramientas');

    // Proyecto -> Operadores

    Route::get('/proyectos/{id}/operadores/create', 'Admin\Proyecto\OperadoresController@create')
    ->name('admin.proyecto.operadores.create');

    Route::post('/proyectos/{id}/operadores/', 'Admin\Proyecto\OperadoresController@store')
    ->name('admin.proyecto.operadores.store');

    Route::get('/proyectos/{id}/operadores/edit', 'Admin\Proyecto\OperadoresController@edit')
    ->name('admin.proyecto.operadores.edit');

    Route::put('/proyectos/{id}/operadores/', 'Admin\Proyecto\OperadoresController@update')
    ->name('admin.proyecto.operadores.update');

    // Proyecto -> Tipos de herramientass

    Route::get('/proyectos/{id}/tipoherramientas/create', 'Admin\Proyecto\TipoHerramientasController@create')
    ->name('admin.proyecto.tipoHerramientas.create');

    Route::post('/proyectos/{id}/tipoherramientas/', 'Admin\Proyecto\TipoHerramientasController@store')
    ->name('admin.proyecto.tipoHerramientas.store');

    Route::get('/proyectos/{id}/tipoherramientas/edit', 'Admin\Proyecto\TipoHerramientasController@edit')
    ->name('admin.proyecto.tipoHerramientas.edit');

    Route::put('/proyectos/{id}/tipoherramientas/', 'Admin\Proyecto\TipoHerramientasController@update')
    ->name('admin.proyecto.tipoHerramientas.update');

		// Roles

		Route::get('/roles', 'Admin\RolesController@index')
		->name('admin.roles.index')
		->middleware('permiso:roles-lista');

    Route::get('/roles/create', 'Admin\RolesController@create')
		->name('admin.roles.create')
		->middleware('permiso:roles-agregar');

    Route::post('/roles', 'Admin\RolesController@store')
		->name('admin.roles.store')
		->middleware('permiso:roles-agregar');

    Route::get('/roles/{id}/edit', 'Admin\RolesController@edit')
		->name('admin.roles.edit')
		->middleware('permiso:roles-editar');

    Route::put('/roles/{id}', 'Admin\RolesController@update')
		->name('admin.roles.update')
		->middleware('permiso:roles-editar');

    Route::delete('/roles/{id}', 'Admin\RolesController@destroy')
		->name('admin.roles.destroy')
		->middleware('permiso:roles-eliminar');

    Route::get('/logout', function(){
      session()->forget('admin');

  		return redirect(route('admin.login.get'));

  	})->name('admin.logout');

  });

});

Route::middleware(['adminGuest'])->group(function(){

  Route::get('/admin/login', 'Admin\Auth\LoginController@get')
	->name('admin.login.get');

  Route::post('/admin/login', 'Admin\Auth\LoginController@post')
	->name('admin.login.post');

});
