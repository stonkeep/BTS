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

//SubTemas
Route::post('/subtemas/create', 'SubTemasController@store');
Route::get('/subtemas/', 'SubTemasController@show');
Route::delete('/subtemas/delete/{subTema}', 'SubTemasController@destroy');
Route::put('/subtemas/update/{subTema}', 'SubTemasController@update');




//Regioes -------------------------------------------------------------------------
Route::get('/regioes/insert', function (){
    return view('regioes.create');
});
Route::post('/regioes/create', 'RegioesController@store');
Route::get('/regioes', 'RegioesController@index');
//Route::delete('/regioes/delete/{regiao}', 'RegioesController@destroy');
Route::get('/regioes/delete/{regiao}', 'RegioesController@destroy');
Route::get('/regioes/check', 'RegioesController@check');
Route::put('/regioes/update/{regiao}', 'RegioesController@update');
Route::get('/regioes/edit/{regiao}', 'RegioesController@edit');






//Publico alvo
Route::post('publicosAlvo/create', 'PublicosAlvoController@store');
Route::get('publicosAlvo', 'PublicosAlvoController@show');
Route::delete('publicosAlvo/delete/{publico}', 'PublicosAlvoController@destroy');
Route::put('publicosAlvo/update/{publico}', 'PublicosAlvoController@update');

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

//instituicoes
Route::post('instituicoes/create', 'InstituicaoController@store');
Route::get('instituicoes', 'InstituicaoController@show');
Route::delete('instituicoes/delete/{instituicao}', 'InstituicaoController@destroy');
Route::put('instituicoes/update/{instituicao}', 'InstituicaoController@update');


//Categorias
Route::post('categorias/create', 'CategoriaController@store');
Route::get('categorias', 'CategoriaController@index');
Route::delete('categorias/delete/{categoria}', 'CategoriaController@destroy');
Route::put('categorias/update/{categoria}', 'CategoriaController@update');


//Responsaveis
Route::post('responsaveis/create', 'ResponsavelController@store');
Route::get('responsaveis', 'ResponsavelController@index');
Route::delete('responsaveis/delete/{responsavel}', 'ResponsavelController@destroy');
Route::put('responsaveis/update/{responsavel}', 'ResponsavelController@update');


//----------------------------------------------------------------------------------------------------------

Auth::routes();

Route::get('/home', 'HomeController@index');
