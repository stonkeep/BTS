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


Route::post(/**
 * @param Request $request
 *
 * @return \Illuminate\Http\JsonResponse
 */
    '/upload', function (Request $request) {
    //****************************************************************************************************
    //*****************************Retirar depois ********************************************************
    //****************************************************************************************************
    $tecnologia = \App\Tecnologia::find(1);
    //****************************************************************************************************
    //*****************************Retirar depois ********************************************************
    //****************************************************************************************************
    $path = public_path(env('PATH_TECNOLOGIA', 'tecnologias/')) . $tecnologia->titulo. '/';

    if (!File::exists($path))
        File::makeDirectory($path);

    $imagem = new Imagem();
    //dd($request->only('images')['images']);
    $validator = Validator::make($request->only('images')['images'], [
        'file.*' => 'required|image'
    ]);

    //TODO Gravar os arquivos de forma correta
    //TODO criar diretório com nome da tecnologia
    //TODO listar os arquivos
    //TODO fazer o delete dos arquivos
    //TODO pensar no update do arquivo
    
    if ($validator->fails()) {
        return response()->json(['errors'=>$validator->errors()]);
    } else {
        $imagesDatas = $request->only('images');
        $imagesDatas = $imagesDatas['images'];
        foreach ($imagesDatas as $imagesData) {
            $fileNamePath = uniqid() . $imagesData['filename'] . '.' . $imagesData['extension'];
            $imagesData = array_add($imagesData, 'path', $path);
            $imagesData = array_add($imagesData, 'fileNamePath', $fileNamePath);
            $tecnologia->imagens()->create(array_except($imagesData, ['file']));
            Image::make($imagesData['file'])->save($path.$fileNamePath);
        }
//        $file = Image::make($imagesData)->save(public_path('images/tecnologias/').$fileName);
//        dd(File::files(public_path('images')));
//        dd(File::name('storage/images/tecnologia/teste5949d5c6bf0a6.jpg'));

//        dd(File::mimeType('images/tecnologias/'.$fileName));
        dd($tecnologia->imagens);
        return response()->json(['error'=>false]);
    }
});
