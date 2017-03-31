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

Route::get('/', function () {
    return view('welcome');
});

//Premios
Route::post('/premio-vigencia/store', 'VigenciasPremioController@store');
Route::get('/premios/', 'VigenciasPremioController@show');

//Temas
Route::post('/temas/create', 'TemasController@store');

//Regioes
Route::post('/regioes/create', 'RegioesController@store');
Route::get('/regioes', 'RegioesController@show');

//Publico alvo
Route::post('publicosAlvo/create', 'PublicosAlvoController@store');
Route::get('publicosAlvo', 'PublicosAlvoController@show');
