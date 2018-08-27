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

//lista usuarios
Route::get('/users/{imei}', 'Admin\UsuariosController@listar');
//descargar proyecto entero a tablet imei
Route::get('/project/{imei}', 'Admin\ProyectosController@listar');
//descargar lista de precios del proyecto
Route::get('/project/prices/{imei}', 'Admin\PrecioItemController@listar');

//descargar solo herramientas principales
Route::get('/project/soloprincipales/{imei}', 'Admin\ProyectosController@listar');
//descargar solo herramientas secundarias
Route::get('/project/solosecundarias/{imei}', 'Admin\ProyectosController@listar');
//descargar solo herramientas de mano
Route::get('/project/solodemano/{imei}', 'Admin\ProyectosController@listar');

//sincronizar sistema desde tablet con chequeo herramientas
Route::post('/herramientas/principales/{imei}', 'Admin\HerramientaController@chequearprincipales');
Route::post('/herramientas/secundarias/{imei}', 'Admin\HerramientaController@chequearsecundarias');
Route::post('/herramientas/demano/{imei}', 'Admin\HerramientaController@chequeardemano');
