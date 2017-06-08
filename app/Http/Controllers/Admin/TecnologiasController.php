<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTecnologia;
use App\Instituicao;
use App\Tecnologia;
use App\Temas;
use App\SubTemas;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TecnologiasController extends Controller
{

    private $autorizado = true;


    public function __construct()
    {
        $user = Auth::user();

        if ( ! $user->can('Tecnologias')) {
            flash('Você não tem acesso suficiente')->error();
            $this->autorizado = false;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( ! $this->autorizado) {
            return back();
        }

        $data = Tecnologia::all();

        return view('admin.tecnologias.show', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( ! $this->autorizado) {
            return back();
        }

        $categorias = Categoria::all();
        $temas = Temas::all();
        $tecnologia = new Tecnologia();
        $propssubtemas1 = new SubTemas();
        $propssubtemas2 = new SubTemas();

        return view('admin.tecnologias.create',
            compact('categorias', 'temas', 'tecnologia', 'propssubtemas1', 'propssubtemas2'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTecnologia $request)
    {

        $instituicaoId = $request['instituicao_id'];
        $instituicao = Instituicao::find($instituicaoId); //TODO tratamento de erro

        $id = Tecnologia::max('id');
        $id = ($id == null) ? 1 : $id;
        if (is_null($request['numeroInscricao'])) {
            $request['numeroInscricao'] = Carbon::now()->year.'/'.($id + 1);
        }

        $input = $request->except(['subtema1', 'subtema2', 'instituicao_id', 'responsaveis', 'locaisImplantacao', 'PublicoAlvo']);
        $tecnologia = $instituicao->tecnologias()->create($input);//TODO tratamento de erro

        //Grava os subtemas principais
        $inputs = $request->only('subtema1');
        foreach ($inputs as $input) {
            $tecnologia->subtemas()->attach($input);//TODO tratamento de erro
        }

        //Grava os subtemas secundários 
        $inputs = $request->only('subtema2');
        foreach ($inputs as $input) {
            $tecnologia->subtemas()->attach($input);//TODO tratamento de erro
        }

        try {
            $responsaveis = $request->only('responsaveis');
            $inputs = $responsaveis['responsaveis'];
            foreach ($inputs as $input) {
                $tecnologia->responsaveis()->create($input);//TODO tratamento de erro
            }
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }

        try {
            $locais = $request->only('locaisImplantacao');
            $inputs = $locais['locaisImplantacao'];
            foreach ($inputs as $input) {
                $tecnologia->locais()->create($input);
            }
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }

        try {
            $locais = $request->only('locaisImplantacao');
            $inputs = $locais['locaisImplantacao'];
            foreach ($inputs as $input) {
                $tecnologia->locais()->create($input);
            }
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }


        try {
            $publico = $request->only('PublicoAlvo');
            $inputs = $publico['PublicoAlvo'];
            foreach ($inputs as $input) {
                $tecnologia->publicos()->attach($input);
            }
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }


        //TODO poderia ser um tratamento de erro geral

        flash('Tecnologia Gravada com Sucesso')->success();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnologia $tecnologia
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnologia $tecnologia)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnologia $tecnologia
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnologia $tecnologia)
    {
        if ( ! $this->autorizado) {
            return back();
        }

        $categorias = Categoria::all();
        $temas = Temas::all();
//        dd($tecnologia->temaPrincipal());
//        dd(strval($tecnologia->temaPrincipal()->first()->id));
//        dd($tecnologia->subtemas->where('tema_id', strval($tecnologia->temaPrincipal()->first()->id)));
        $subtemasPrincipal = $tecnologia->subtemasPrincipal();

//        dd($subtemasPrincipal);
        return view('admin.tecnologias.edit', compact('tecnologia', 'categorias', 'temas', 'subtemasPrincipal'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tecnologia          $tecnologia
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnologia $tecnologia)
    {
        $this->validate($request, [
            'numeroInscricao' => 'required',
        ]);

        $input = $request->except(['subtema1', 'subtema2', 'instituicao_id']);

        $tecnologia->update($input);
        // TODO ajustar edição com as outras tabelas
        flash('Tecnologia '.$tecnologia->titulo.' atualizada com sucesso')->success();

        //desfaz todas as ligações anteriores
        $tecnologia->subtemas()->detach();

        $inputs = array_merge($request->only('subtema1'), $request->only('subtema2'));

        foreach ($inputs as $input) {
            $tecnologia->subtemas()->attach($input);//TODO tratamento de erro
        }

        ////Grava os subtemas secundários
        //$inputs = $request->only('subtema2');
        //foreach ($inputs as $input) {
        //    $tecnologia->subtemas()->attach($input);//TODO tratamento de erro
        //}

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnologia $tecnologia
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnologia $tecnologia)
    {
        $tecnologia->delete();

        flash('Tecnologia '.$tecnologia->titulo.' deletada com sucesso')->success();

        return redirect(route('indexTecnologias'));
    }
}
