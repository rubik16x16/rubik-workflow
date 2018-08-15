<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/herramientas', 'Admin\Api\HerramientasController@index')
  ->name('admin.herramientas.api.index');

// Proyectos

Route::get('/admin/proyecto/tipoherramientas', 'Admin\Proyecto\Api\TipoHerramientasController@get')
  ->name('api.admin.proyecto.tipoHerramientas.get');

Route::get('/admin/proyecto/operadores', 'Admin\Proyecto\Api\OperadoresController@get')
  ->name('api.admin.proyecto.operadores.get');
