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
Route::delete('/premios/delete/{premio}', 'VigenciasPremioController@destroy');
Route::put('/premios/update/{premio}', 'VigenciasPremioController@update');

//Temas
Route::post('/temas/create', 'TemasController@store');
Route::get('/temas/', 'TemasController@show');
Route::delete('/temas/delete/{tema}', 'TemasController@destroy');
Route::put('/temas/update/{tema}', 'TemasController@update');

//Regioes
Route::post('/regioes/create', 'RegioesController@store');
Route::get('/regioes', 'RegioesController@show');

//Publico alvo
Route::post('publicosAlvo/create', 'PublicosAlvoController@store');
Route::get('publicosAlvo', 'PublicosAlvoController@show');

//Naturezas Juridicas
Route::post('naturezasJuridicas/create', 'NaturezasJuridicasController@store');
Route::get('naturezasJuridicas', 'NaturezasJuridicasController@show');
Route::delete('naturezasJuridicas/delete/{natureza}', 'NaturezasJuridicasController@destroy');
Route::put('naturezasJuridicas/update/{natureza}', 'NaturezasJuridicasController@update');

//Cargos
Route::post('cargos/create', 'CargosController@store');
Route::get('cargos', 'CargosController@show');
Route::delete('cargos/delete/{cargo}', 'CargosController@destroy');
Route::put('cargos/update/{cargo}', 'CargosController@update');
