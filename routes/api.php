<?php

use App\Imagem;
use Carbon\Carbon;
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

Route::get('/subtemas/{temas}', function (\App\Temas $temas) {
    return $temas->subTemas()->get();
});

Route::get('/tecnologias', function (Request $request) {
    return \App\Tecnologia::select('id', 'titulo', 'created_at', 'updated_at')
        ->where('titulo', 'LIKE', '%' . $request->search . '%')
        ->paginate($request->pagesize)
        ->toJson();

});