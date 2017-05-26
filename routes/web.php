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

Route::group(['namespace' => 'Admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

//Route::group(['middleware' => 'auth'], function () {
//Premios
    Route::get('/admin/premios/insert', function () {
        return view('premios.create');
    });
    Route::post('/admin/premios/create', 'VigenciasPremioController@store');
    Route::get('/admin/premios/', 'VigenciasPremioController@index');
    Route::get('/admin/premios/delete/{premio}', 'VigenciasPremioController@destroy');
    Route::put('/admin//premios/update/{premio}', 'VigenciasPremioController@update');
    Route::get('/admin/premios/edit/{premio}', 'VigenciasPremioController@edit');

//Temas
    Route::get('/admin/temas/insert', function () {
        return view('temas.create');
    });
    Route::post('/admin/temas/create', 'TemasController@store');
    Route::get('/admin/temas/', 'TemasController@index');
    Route::get('/admin/temas/delete/{tema}', 'TemasController@destroy');
    Route::put('/admin//temas/update/{tema}', 'TemasController@update');
    Route::get('/admin/temas/edit/{tema}', 'TemasController@edit');

//SubTemas
    Route::get('/admin/subtemas/insert', 'SubTemasController@create');
    Route::post('/admin/subtemas/create', 'SubTemasController@store');
    Route::get('/admin/subtemas/', 'SubTemasController@index');
    Route::get('/admin/subtemas/delete/{subTema}', 'SubTemasController@destroy');
    Route::put('/admin//subtemas/update/{subTema}', 'SubTemasController@update');
    Route::get('/admin/subtemas/edit/{subTema}', 'SubTemasController@edit');

//Regioes -------------------------------------------------------------------------
    Route::get('/admin/regioes/insert', function () {
        return view('regioes.create');
    });
    Route::post('/admin/regioes/create', 'RegioesController@store');
    Route::get('/admin/regioes', 'RegioesController@index');
//Route::delete('/regioes/delete/{regiao}', 'RegioesController@destroy');
    Route::get('/admin/regioes/delete/{regiao}', 'RegioesController@destroy');
//Route::get('/admin/regioes/check', 'RegioesController@check');
    Route::put('/admin//regioes/update/{regiao}', 'RegioesController@update');
    Route::get('/admin/regioes/edit/{regiao}', 'RegioesController@edit');

//Publico alvo
    Route::get('/admin/publicosAlvo/insert', function () {
        return view('publicosAlvo.create');
    });
    Route::post('/admin/publicosAlvo/create', 'PublicosAlvoController@store');
    Route::get('/admin/publicosAlvo', 'PublicosAlvoController@show');
    Route::get('/admin/publicosAlvo/delete/{publico}', 'PublicosAlvoController@destroy');
    Route::put('/admin/publicosAlvo/update/{publico}', 'PublicosAlvoController@update');
    Route::get('/admin/publicosAlvo/edit/{publico}', 'PublicosAlvoController@edit');

//Naturezas Juridicas
    Route::get('/admin/naturezasJuridicas/insert', function () {
        return view('naturezasJuridicas.create');
    });
    Route::post('/admin/naturezasJuridicas/create', 'NaturezasJuridicasController@store');
    Route::get('/admin/naturezasJuridicas', 'NaturezasJuridicasController@index');
    Route::get('/admin/naturezasJuridicas/delete/{natureza}', 'NaturezasJuridicasController@destroy');
    Route::put('/admin/naturezasJuridicas/update/{natureza}', 'NaturezasJuridicasController@update');
    Route::get('/admin/naturezasJuridicas/edit/{natureza}', 'NaturezasJuridicasController@edit');

//Cargos
    Route::get('/admin/cargos/insert', function () {
        return view('cargos.create');
    });
    Route::post('/admin/cargos/create', 'CargosController@store');
    Route::get('/admin/cargos', 'CargosController@index');
    Route::get('/admin/cargos/delete/{cargo}', 'CargosController@destroy');
    Route::put('/admin/cargos/update/{cargo}', 'CargosController@update');
    Route::get('/admin/cargos/edit/{cargo}', 'CargosController@edit');

//instituicoes
    Route::get('/admin/instituicoes/insert', function () {
        return view('instituicoes.create');
    });
    Route::post('/admin/instituicoes/create', 'InstituicaoController@store');
    Route::get('/admin/instituicoes', 'InstituicaoController@show');
    Route::get('/admin/instituicoes/delete/{instituicao}', 'InstituicaoController@destroy');
    Route::put('/admin/instituicoes/update/{instituicao}', 'InstituicaoController@update');

//Categorias
    Route::get('/admin/categorias/insert', 'CategoriaController@create');
    Route::post('/admin/categorias/create', 'CategoriaController@store');
    Route::get('/admin/categorias', 'CategoriaController@index');
    Route::get('/admin/categorias/delete/{categoria}', 'CategoriaController@destroy');
    Route::put('/admin/categorias/update/{categoria}', 'CategoriaController@update');
    Route::get('/admin/categorias/edit/{categoria}', 'CategoriaController@edit');

//Responsaveis
    Route::post('/admin/responsaveis/create', 'ResponsavelController@store');
    Route::get('/admin/responsaveis', 'ResponsavelController@index');
    Route::delete('responsaveis/delete/{responsavel}', 'ResponsavelController@destroy');
    Route::put('/admin/responsaveis/update/{responsavel}', 'ResponsavelController@update');

//Tecnologias
    Route::get('/admin/tecnologias/insert', 'TecnologiasController@create');

    Route::post('/admin/tecnologias/create', 'TecnologiasController@store');
    Route::get('/admin/tecnologias', 'TecnologiasController@index');
    Route::get('/admin/tecnologias/delete/{tecnologia}', 'TecnologiasController@destroy');
    Route::put('/admin/tecnologias/update/{tecnologia}', 'TecnologiasController@update');
    Route::get('/admin/tecnologias/edit/{tecnologia}', 'TecnologiasController@edit');
//});
    Route::get('/admin/usu', function () {
        $categorias = \App\Categoria::all();

        return view('users.show', compact('categorias'));
    });
});
//----------------------------------------------------------------------------------------------------------

Auth::routes();

Route::get('/admin/home', 'HomeController@index');
