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
    })->name('insertPremios');
    Route::post('/premios/create', 'VigenciasPremioController@store')->name('storePremios');
    Route::get('/premios/', 'VigenciasPremioController@index')->name('indexPremios');
    Route::get('/premios/delete/{premio}', 'VigenciasPremioController@destroy')->name('destroyPremios');
    Route::put('/premios/update/{premio}', 'VigenciasPremioController@update')->name('updatePremios');
    Route::get('/premios/edit/{premio}', 'VigenciasPremioController@edit')->name('editPremios');

//Temas
    Route::get('/temas/insert', function () {
        return view('admin.temas.create');
    })->name('insertTemas');
    Route::post('/temas/create', 'TemasController@store')->name('storeTemas');
    Route::get('/temas/', 'TemasController@index')->name('indexTemas');
    Route::get('/temas/delete/{tema}', 'TemasController@destroy')->name('destroyTemas');
    Route::put('/temas/update/{tema}', 'TemasController@update')->name('updateTemas');
    Route::get('/temas/edit/{tema}', 'TemasController@edit')->name('editTemas');

//SubTemas
    Route::get('/subtemas/insert', 'SubTemasController@create')->name('insertSubTemas');
    Route::post('/subtemas/create', 'SubTemasController@store')->name('storeSubTemas');
    Route::get('/subtemas/', 'SubTemasController@index')->name('indexSubTemas');
    Route::get('/subtemas/delete/{subTema}', 'SubTemasController@destroy')->name('destroySubTemas');
    Route::put('/subtemas/update/{subTema}', 'SubTemasController@update')->name('updateSubTemas');
    Route::get('/subtemas/edit/{subTema}', 'SubTemasController@edit')->name('editSubTemas');

//Regioes -------------------------------------------------------------------------
    Route::get('/regioes/insert', function () {
        return view('admin.regioes.create');
    })->name('insertRegioes');
    Route::post('/regioes/create', 'RegioesController@store')->name('storeRegioes');
    Route::get('/regioes', 'RegioesController@index')->name('indexRegioes');
//Route::delete('/regioes/delete/{regiao}', 'RegioesController@destroy');
    Route::get('/regioes/delete/{regiao}', 'RegioesController@destroy')->name('destroyRegioes');
//Route::get('/regioes/check', 'RegioesController@check');
    Route::put('/regioes/update/{regiao}', 'RegioesController@update')->name('updateRegioes');
    Route::get('/regioes/edit/{regiao}', 'RegioesController@edit')->name('editRegioes');

//Publico alvo
    Route::get('/publicosAlvo/insert', function () {
        return view('admin.publicosAlvo.create');
    })->name('insertPublicoAlvo');
    Route::post('/publicosAlvo/create', 'PublicosAlvoController@store')->name('storePublicoAlvo');
    Route::get('/publicosAlvo', 'PublicosAlvoController@index')->name('indexPublicoAlvo');
    Route::get('/publicosAlvo/delete/{publico}', 'PublicosAlvoController@destroy')->name('destroyPublicoAlvo');
    Route::put('/publicosAlvo/update/{publico}', 'PublicosAlvoController@update')->name('updatePublicoAlvo');
    Route::get('/publicosAlvo/edit/{publico}', 'PublicosAlvoController@edit')->name('editPublicoAlvo');

//Naturezas Juridicas
    Route::get('/naturezasJuridicas/insert', function () {
        return view('admin.naturezasJuridicas.create');
    })->name('insertNaturezaJuridica');
    Route::post('/naturezasJuridicas/create', 'NaturezasJuridicasController@store')->name('storeNaturezaJuridica');
    Route::get('/naturezasJuridicas', 'NaturezasJuridicasController@index')->name('indexNaturezaJuridica');
    Route::get('/naturezasJuridicas/delete/{natureza}',
        'NaturezasJuridicasController@destroy')->name('destroyNaturezaJuridica');
    Route::put('/naturezasJuridicas/update/{natureza}',
        'NaturezasJuridicasController@update')->name('updateNaturezaJuridica');
    Route::get('/naturezasJuridicas/edit/{natureza}',
        'NaturezasJuridicasController@edit')->name('editNaturezaJuridica');

//Cargos
    Route::get('/cargos/insert', 'CargosController@create')->name('insertCargos');
    Route::post('/cargos/create', 'CargosController@store')->name('storeCargos');
    Route::get('/cargos', 'CargosController@index')->name('indexCargos');
    Route::get('/cargos/delete/{cargo}', 'CargosController@destroy')->name('destroyCargos');
    Route::put('/cargos/update/{cargo}', 'CargosController@update')->name('updateCargos');
    Route::get('/cargos/edit/{cargo}', 'CargosController@edit')->name('editCargos');

//instituicoes
    Route::get('/instituicoes/insert', function () {
        return view('admin.instituicoes.create');
    })->name('insertInstituicoes');
    Route::post('/instituicoes/create', 'InstituicaoController@store')->name('storeInstituicoes');
    Route::get('/instituicoes', 'InstituicaoController@index')->name('indexInstituicoes');
    Route::get('/instituicoes/delete/{instituicao}', 'InstituicaoController@destroy')->name('destroyInstituicoes');
    Route::put('/instituicoes/update/{instituicao}', 'InstituicaoController@update')->name('updateInstituicoes');

//Categorias
    Route::get('/categorias/insert', 'CategoriaController@create')->name('insertCategorias');
    Route::post('/categorias/create', 'CategoriaController@store')->name('storeCategorias');
    Route::get('/categorias', 'CategoriaController@index')->name('indexCategorias');
    Route::get('/categorias/delete/{categoria}', 'CategoriaController@destroy')->name('destroyCategorias');
    Route::put('/categorias/update/{categoria}', 'CategoriaController@update')->name('updateCategorias');
    Route::get('/categorias/edit/{categoria}', 'CategoriaController@edit')->name('editCategorias');

//Responsaveis
    Route::post('/responsaveis/create', 'ResponsavelController@store')->name('storeResponsaveis');
    Route::get('/responsaveis', 'ResponsavelController@index')->name('indexResponsaveis');
    Route::delete('/responsaveis/delete/{responsavel}', 'ResponsavelController@destroy')->name('destroyResponsaveis');
    Route::put('/responsaveis/update/{responsavel}', 'ResponsavelController@update')->name('storeResponsaveis');

//Tecnologias
    Route::get('/tecnologias/insert', 'TecnologiasController@create')->name('insertTecnologias');

    Route::post('/tecnologias/create', 'TecnologiasController@store')->name('storeTecnologias');
    Route::get('/tecnologias', 'TecnologiasController@index')->name('indexTecnologias');
    Route::get('/tecnologias/delete/{tecnologia}', 'TecnologiasController@destroy')->name('destroyTecnologias');
    Route::put('/tecnologias/update/{tecnologia}', 'TecnologiasController@update')->name('updateTecnologias');
    Route::get('/tecnologias/edit/{tecnologia}', 'TecnologiasController@edit')->name('editTecnologias');


    // Settings
    //Files
    Route::get('files', function () {
        return view('admin.settings.files');
    });

    Route::get('posts', 'PostController@index')->name('indexPosts');
    // show new post form
    Route::get('new-post', 'PostController@create')->name('createPosts');
    // save new post
    Route::post('new-post', 'PostController@store')->name('storePosts');
    // edit post form
    Route::get('posts/edit/{slug}', 'PostController@edit')->name('editPosts');
    // update post
    Route::post('post/update/', 'PostController@update')->name('updatePosts');
    // delete post
    Route::get('posts/delete/{id}', 'PostController@destroy')->name('destroyPosts');
    // display user's all posts
    Route::get('my-all-posts', 'UserController@user_posts_all');
    // display user's drafts
    Route::get('my-drafts', 'UserController@user_posts_draft');

    // delete comment
    Route::post('comment/delete/{id}', 'CommentsController@destroy')->name('destroyComments');

    //Categorias dos Posts
    Route::get('/post-categorias/insert', 'PostCategoriaController@create')->name('insertPostCategorias');
    Route::post('/post-categorias/store', 'PostCategoriaController@store')->name('storePostCategorias');
    Route::get('/post-categorias', 'PostCategoriaController@index')->name('indexPostCategorias');
    Route::get('/post-categorias/delete/{postCategoria}', 'PostCategoriaController@destroy')->name('destroyPostCategorias');
    Route::put('/post-categorias/update/{postCategoria}', 'PostCategoriaController@update')->name('updatePostCategorias');
    Route::get('/post-categorias/edit/{postCategoria}', 'PostCategoriaController@edit')->name('editPostCategorias');

////users profile
//    Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
//// display list of posts
//    Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');


    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

});
//----------------------------------------------------------------------------------------------------------

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index')->name('adminHome');

// add comment
Route::post('comment/add', 'Admin\CommentsController@store')->name('storeComments');
//
//// display single post
Route::get('/posts/{slug}', ['as' => 'post', 'uses' => 'Admin\PostController@show'])->where('slug', '[A-Za-z0-9-_]+');

//Procura por tecnologia
Route::post('/pesquisa', 'Admin\TecnologiasController@pesquisa')->name('pesquisa');
Route::get('/pesquisa', function () {
    return view('front.index');
})->name('insertPremios');