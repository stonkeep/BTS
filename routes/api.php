<?php

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


Route::post('/upload', function (Request $request) {
    $path = public_path(env('PATH_TECNOLOGIA', 'tecnologias/'));

    $validator = Validator::make($request->only('image')['image'], [
        'image.*' => 'required|image'
    ]);

    //TODO Gravar os arquivos de forma correta
    //TODO criar diretório com nome da tecnologia
    //TODO listar os arquivos
    //TODO fazer o delete dos arquivos
    //TODO pensar no update do arquivo
    
    if ($validator->fails()) {
        return response()->json(['errors'=>$validator->errors()]);
    } else {
        $imagesDatas = $request->only('image');
        $imagesDatas = $imagesDatas['image'];
        foreach ($imagesDatas as $imagesData) {
            $fileName = 'teste' . uniqid() . '.jpg';
            $file = Image::make($imagesData)->save($path.$fileName);
        }
//        $fileName = 'teste' . uniqid() . '.jpg';
////        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
//        $file = Image::make($imagesData)->save(public_path('images/tecnologias/').$fileName);
//        dd(File::files(public_path('images')));
//        dd(File::name('storage/images/tecnologia/teste5949d5c6bf0a6.jpg'));

//        dd(File::mimeType('images/tecnologias/'.$fileName));
        dd(Storage::allDirectories('storage/images/tecnologia/'));
        return response()->json(['error'=>false]);
    }
});
