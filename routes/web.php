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

// Route::get('/{i1?}/{i2?}/', function(){ return view('principal'); });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/comprobante/{id}', 'comprobanteCtrl@index');
Route::get('/{i1?}/{i2?}/{i3?}/{i4?}/{i5?} ', function(){ return view('principal'); });