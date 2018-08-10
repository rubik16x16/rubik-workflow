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

Route::get('/admin/tipoherramientas', 'Admin\Api\TipoHerramientasController@index')
  ->name('admin.tipoHerramientas.api.index');

Route::get('/admin/herramientas', 'Admin\Api\HerramientasController@index')
  ->name('admin.herramientas.api.index');
