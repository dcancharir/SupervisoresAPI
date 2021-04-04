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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>['jwt.auth'],'prefix'=>'v1'],function(){
    Route::post('/auth/refrescarToken','AuthController@refrescarToken');
    Route::post('/auth/cerrarSesion','AuthController@cerrarSesion');
    Route::post('/auth/usuarioActual','AuthController@usuarioActual');
    Route::post('/tienda/supervisor','TiendaController@obtenerTiendasSupervisor');
});




Route::group(['middleware'=>[],'prefix'=>'v1'],function(){
    Route::post('/auth/acceso','AuthController@acceso');
    Route::get('/tiendas','TiendaController@obtenerTodo');
    Route::get('/generarVentaDiaria','VentaDiariaController@generarVentaDiaria');
    Route::get('/tiendas/ventaHoy','TiendaController@obtenerTiendasyVentaDiaria');
});