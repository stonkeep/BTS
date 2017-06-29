<?php

namespace App\Http\Controllers\Admin;

use App\Cargos;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstituicoesRequest;
use App\Instituicao;
use App\NaturezasJuridicas;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Tests\Unit\InstituicaoTest;
use Validator;

class InstituicaoController extends Controller
{

    private $autorizado = true;


    public function __construct()
    {
        //verifica se usuário tem acesso ao controle
        $user = Auth::user();
        if ( ! $user->hasPermissionTo('Instituicoes')) {
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

        $data = Instituicao::all();

        return view('admin.instituicoes.show', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $naturezaJuridicaOptions = NaturezasJuridicas::all();
        $cargooptions = Cargos::all();

        return view('admin.instituicoes.create', compact('naturezaJuridicaOptions', 'cargooptions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstituicoesRequest $request)
    {
        //Valida dados para criacao de instituicao
        Validator::make($request->all(), [
            'CNPJ' => 'required|unique:instituicaos|numeric|cnpj',
        ])->validate();

        try {
            $inputs = $request->except('cargo_id', 'naturezaJuridica');
            $inputs = array_add($inputs, 'cargo_id', $request->only('cargo_id')['cargo_id']['id']);
            $inputs = array_add($inputs, 'naturezaJuridica',
                $request->only('naturezaJuridica')['naturezaJuridica']['id']);
            $instituicao = Instituicao::create($inputs);
            flash('Instituição '.$instituicao->razaoSocial.' criada com sucesso')->success();

            return redirect(route('instituicoes.index'));
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao $instituicao
     *
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
     * @param  \App\Instituicao $instituicao
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ( ! $this->autorizado) {
            return back();
        }
        $naturezaJuridicaOptions = NaturezasJuridicas::all();
        $cargooptions = Cargos::all();
        $instituicao = Instituicao::find($id);

        return view('admin.instituicoes.edit', compact('instituicao', 'cargooptions', 'naturezaJuridicaOptions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Instituicao         $instituicao
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInstituicoesRequest $request, $id)
    {
        //Valida dados para atualização
        $this->validate($request, [
            'CNPJ' => 'required|cnpj',
        ]);

        try {
            $instituicao = Instituicao::find($id);
            $inputs = $request->except('cargo_id', 'naturezaJuridica');
            $inputs = array_add($inputs, 'cargo_id', $request->only('cargo_id')['cargo_id']['id']);
            $inputs = array_add($inputs, 'naturezaJuridica',
                $request->only('naturezaJuridica')['naturezaJuridica']['id']);
            $instituicao->update($inputs);
            flash('Instituição '.$instituicao->razaoSocial.' atualizada com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao $instituicao
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $instituicao = Instituicao::find($id);
            $instituicao->delete();
            flash('Instituição '.$instituicao->razaoSocial.' deletada com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }

        return redirect(route('instituicoes.index'));
    }
}
