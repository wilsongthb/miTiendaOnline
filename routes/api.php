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

Route::resource('productos', 'productosRsrc');
Route::resource('misproductos', 'misproductosRsrc');
Route::get('cuenta', 'cuentaController@index');
Route::put('cuenta/user', 'cuentaController@user');
Route::put('cuenta/vendedor', 'cuentaController@vendedor');
Route::put('cuenta/clave', 'cuentaController@clave');
Route::post('compras', 'transaccionesController@store');
// Route::resource('compras', 'comprasRsrs');
Route::get('compras', 'comprasRsrc@index');