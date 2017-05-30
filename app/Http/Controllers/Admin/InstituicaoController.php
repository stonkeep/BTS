<?php

namespace App\Http\Controllers\Admin;

use App\Cargos;
use App\Http\Controllers\Controller;
use App\Instituicao;
use App\NaturezasJuridicas;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'CNPJ' => 'required|unique:instituicaos|numeric|cnpj',
            'razaoSocial' => 'required',
            'naturezaJuridica' => 'required|exists:naturezas_juridicas,id',
            'nomeDaArea' => 'required',
            'ddd' => 'required|numeric',
            'telefone' => 'required',
            'email' => 'required|email',
            'UF' => 'required',
            'cidade' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'CEP' => 'required|numeric',
            'site' => 'required|url',
            'nomeCompleto' => 'required',
            'cargo_id' => 'required|exists:cargos,id',
            'sexo' => 'required|string|size:1',
            'CPF' => 'required|numeric|cpf',
        ]);

        Instituicao::create($request->all());

        $instituicoes = Instituicao::all();
        //dd($instituicoes);
        return view('admin.instituicoes.show', compact('instituicoes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicao $instituicao)
    {
        $instituicoes = Instituicao::all();
//        dd($instituicoes);
        return view('admin.instituicoes.show', compact('instituicoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $instituicao)
    {
        return view('admin.instituicoes.edit', compact('instituicao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicao $instituicao)
    {
        $this->validate($request, [
            'CNPJ' => 'required|numeric|cnpj',
            'razaoSocial' => 'required',
            'naturezaJuridica' => 'required|exists:naturezas_juridicas,id',
            'nomeDaArea' => 'required',
            'ddd' => 'required|numeric',
            'telefone' => 'required',
            'email' => 'required|email',
            'UF' => 'required',
            'cidade' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'CEP' => 'required|numeric',
            'site' => 'required|url',
            'nomeCompleto' => 'required',
            'cargo_id' => 'required|exists:cargos,id',
            'sexo' => 'required|string|size:1',
            'CPF' => 'required|numeric|cpf',
        ]);

        $instituicao->update($request->all());
        flash('Instituição atualizada com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicao $instituicao)
    {
        try {
            $instituicao->delete();
            flash('Instituição '.$instituicao->razaoSocial.' deletada com sucesso')->success();

        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }
        
        flash('Instituição deletado com sucesso')->success();
        return redirect(route('indexInstituicoes'));
    }
}
