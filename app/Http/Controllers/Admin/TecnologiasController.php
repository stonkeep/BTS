<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Instituicao;
use App\Tecnologia;
use App\Temas;
use App\SubTemas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TecnologiasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologias = Tecnologia::all();

        return view('admin.tecnologias.show', compact('tecnologias'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function store(Request $request)
    {
        $this->validate($request, [
//            'numeroInscricao' => 'required|unique:tecnologias,numeroInscricao',
            'titulo'               => 'required|unique:tecnologias,titulo',
            'fimLucrativo'         => 'required|boolean',
            'tempoImplantacao'     => 'required',
            'emAtividade'          => 'required|boolean',
            'inscricaoAnterior'    => 'required|boolean',
            'investimentoFBB'      => 'required|boolean',
            'categoria_id'         => 'required',
            'resumo'               => 'required',
            'tema_id'              => 'required|different:temaSecundario_id|exists:temas,id',
            'temaSecundario_id'    => 'required|different:tema_id|exists:temas,id',
            'problema'             => 'required',
            'objetivoGeral'        => 'required',
            'objetivoEspecifico'   => 'required',
            'descricao'            => 'required',
            'resultadosAlcancados' => 'required',
            'recursosMateriais'    => 'required',
            'valorEstimado'        => 'required',
            'valorHumanos'         => 'required',
            'depoimentoLivre'      => 'required',
            'instituicao_id'       => 'required|exists:instituicaos,id',
            'subtema1'             => 'required|exists:sub_temas,id',
            'subtema2'             => 'required|exists:sub_temas,id',
        ]);

//       $request['numeroInscricao'] = Carbon::now()->year . '/' . (Tecnologia::all()->last()->id + 1);

        $instituicaoId = $request['instituicao_id'];
        $instituicao = Instituicao::find($instituicaoId); //TODO tratamento de erro

        $id = Tecnologia::max('id');
        $id = ($id == null) ? 1 : $id;
        if (is_null($request['numeroInscricao'])) {
            $request['numeroInscricao'] = Carbon::now()->year.'/'.($id + 1);
        }

        $input = $request->except(['subtema1', 'subtema2', 'instituicao_id']);
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
            'numeroInscricao'      => 'required',
            'titulo'               => 'required',
            'fimLucrativo'         => 'required|boolean',
            'tempoImplantacao'     => 'required',
            'emAtividade'          => 'required|boolean',
            'inscricaoAnterior'    => 'required|boolean',
            'investimentoFBB'      => 'required|boolean',
            'categoria_id'         => 'required',
            'resumo'               => 'required',
            'tema_id'              => 'required|different:temaSecundario_id|exists:temas,id',
            'temaSecundario_id'    => 'required|different:tema_id|exists:temas,id',
            'problema'             => 'required',
            'objetivoGeral'        => 'required',
            'objetivoEspecifico'   => 'required',
            'descricao'            => 'required',
            'resultadosAlcancados' => 'required',
            'recursosMateriais'    => 'required',
            'valorEstimado'        => 'required',
            'valorHumanos'         => 'required',
            'depoimentoLivre'      => 'required',
            'instituicao_id'       => 'required|exists:instituicaos,id',
            'subtema1'             => 'required|exists:sub_temas,id',
            'subtema2'             => 'required|exists:sub_temas,id',
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

        $tecnologias = Tecnologia::all();
        flash('Tecnologia '.$tecnologia->titulo.' deletada com sucesso')->success();

        return view('admin.tecnologias.show', compact('tecnologias'));
    }
}
