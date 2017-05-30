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

//TODO Colocar route em todos os links do laravel
//TODO Criar categorias

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

//Route::group(['middleware' => 'auth'], function () {
//Premios
    Route::get('/premios/insert', function () {
        return view('admin.premios.create');
    });
    Route::post('/premios/create', 'VigenciasPremioController@store');
    Route::get('/premios/', 'VigenciasPremioController@index');
    Route::get('/premios/delete/{premio}', 'VigenciasPremioController@destroy');
    Route::put('/premios/update/{premio}', 'VigenciasPremioController@update');
    Route::get('/premios/edit/{premio}', 'VigenciasPremioController@edit');

//Temas
    Route::get('/temas/insert', function () {
        return view('admin.temas.create');
    });
    Route::post('/temas/create', 'TemasController@store');
    Route::get('/temas/', 'TemasController@index');
    Route::get('/temas/delete/{tema}', 'TemasController@destroy');
    Route::put('/temas/update/{tema}', 'TemasController@update');
    Route::get('/temas/edit/{tema}', 'TemasController@edit');

//SubTemas
    Route::get('/subtemas/insert', 'SubTemasController@create');
    Route::post('/subtemas/create', 'SubTemasController@store');
    Route::get('/subtemas/', 'SubTemasController@index');
    Route::get('/subtemas/delete/{subTema}', 'SubTemasController@destroy');
    Route::put('/subtemas/update/{subTema}', 'SubTemasController@update');
    Route::get('/subtemas/edit/{subTema}', 'SubTemasController@edit');

//Regioes -------------------------------------------------------------------------
    Route::get('/regioes/insert', function () {
        return view('admin.regioes.create');
    });
    Route::post('/regioes/create', 'RegioesController@store');
    Route::get('/regioes', 'RegioesController@index');
//Route::delete('/regioes/delete/{regiao}', 'RegioesController@destroy');
    Route::get('/regioes/delete/{regiao}', 'RegioesController@destroy');
//Route::get('/regioes/check', 'RegioesController@check');
    Route::put('/regioes/update/{regiao}', 'RegioesController@update');
    Route::get('/regioes/edit/{regiao}', 'RegioesController@edit');

//Publico alvo
    Route::get('/publicosAlvo/insert', function () {
        return view('admin.publicosAlvo.create');
    });
    Route::post('/publicosAlvo/create', 'PublicosAlvoController@store');
    Route::get('/publicosAlvo', 'PublicosAlvoController@show');
    Route::get('/publicosAlvo/delete/{publico}', 'PublicosAlvoController@destroy');
    Route::put('/publicosAlvo/update/{publico}', 'PublicosAlvoController@update');
    Route::get('/publicosAlvo/edit/{publico}', 'PublicosAlvoController@edit');

//Naturezas Juridicas
    Route::get('/naturezasJuridicas/insert', function () {
        return view('admin.naturezasJuridicas.create');
    });
    Route::post('/naturezasJuridicas/create', 'NaturezasJuridicasController@store');
    Route::get('/naturezasJuridicas', 'NaturezasJuridicasController@index');
    Route::get('/naturezasJuridicas/delete/{natureza}', 'NaturezasJuridicasController@destroy');
    Route::put('/naturezasJuridicas/update/{natureza}', 'NaturezasJuridicasController@update');
    Route::get('/naturezasJuridicas/edit/{natureza}', 'NaturezasJuridicasController@edit');

//Cargos
    Route::get('/cargos/insert', function () {
        return view('admin.cargos.create');
    })->name('insertCargos');;
    Route::post('/cargos/create', 'CargosController@store')->name('storeCargos');
    Route::get('/cargos', 'CargosController@index')->name('indexCargos');
    Route::get('/cargos/delete/{cargo}', 'CargosController@destroy')->name('destroyCargos');
    Route::put('/cargos/update/{cargo}', 'CargosController@update')->name('updateCargos');
    Route::get('/cargos/edit/{cargo}', 'CargosController@edit')->name('editCargos');

//instituicoes
    Route::get('/instituicoes/insert', function () {
        return view('admin.instituicoes.create');
    });
    Route::post('/instituicoes/create', 'InstituicaoController@store');
    Route::get('/instituicoes', 'InstituicaoController@show');
    Route::get('/instituicoes/delete/{instituicao}', 'InstituicaoController@destroy');
    Route::put('/instituicoes/update/{instituicao}', 'InstituicaoController@update');

//Categorias
    Route::get('/categorias/insert', 'CategoriaController@create');
    Route::post('/categorias/create', 'CategoriaController@store');
    Route::get('/categorias', 'CategoriaController@index');
    Route::get('/categorias/delete/{categoria}', 'CategoriaController@destroy');
    Route::put('/categorias/update/{categoria}', 'CategoriaController@update');
    Route::get('/categorias/edit/{categoria}', 'CategoriaController@edit');

//Responsaveis
    Route::post('/responsaveis/create', 'ResponsavelController@store');
    Route::get('/responsaveis', 'ResponsavelController@index');
    Route::delete('/responsaveis/delete/{responsavel}', 'ResponsavelController@destroy');
    Route::put('/responsaveis/update/{responsavel}', 'ResponsavelController@update');

//Tecnologias
    Route::get('/tecnologias/insert', 'TecnologiasController@create');

    Route::post('/tecnologias/create', 'TecnologiasController@store');
    Route::get('/tecnologias', 'TecnologiasController@index');
    Route::get('/tecnologias/delete/{tecnologia}', 'TecnologiasController@destroy');
    Route::put('/tecnologias/update/{tecnologia}', 'TecnologiasController@update');
    Route::get('/tecnologias/edit/{tecnologia}', 'TecnologiasController@edit');


    //users
    Route::get('/usu', function () {
        $categorias = \App\Categoria::all();

        return view('admin.admin.users.show', compact('categorias'));
    });


    // Settings
    //Files
    Route::get('files', function (){
        return view('admin.settings.files');
    });


    Route::get('posts', 'PostController@index');
    // show new post form
    Route::get('new-post','PostController@create');
    // save new post
    Route::post('new-post','PostController@store');
    // edit post form
    Route::get('posts/edit/{slug}','PostController@edit');
    // update post
    Route::post('post/update','PostController@update');
    // delete post
    Route::get('posts/delete/{id}','PostController@destroy');
    // display user's all posts
    Route::get('my-all-posts','UserController@user_posts_all');
    // display user's drafts
    Route::get('my-drafts','UserController@user_posts_draft');

    // delete comment
    Route::post('comment/delete/{id}','CommentsController@destroy');





////users profile
//    Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
//// display list of posts
//    Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');


});
//----------------------------------------------------------------------------------------------------------

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index');


// add comment
Route::post('comment/add','Admin\CommentsController@store');
//
//// display single post
Route::get('/posts/{slug}',['as' => 'post', 'uses' => 'Admin\PostController@show'])->where('slug', '[A-Za-z0-9-_]+');

