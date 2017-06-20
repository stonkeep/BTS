<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTecnologia;
use App\Instituicao;
use App\PublicosAlvo;
use App\Tecnologia;
use App\Temas;
use App\SubTemas;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TecnologiasController extends Controller
{

    private $autorizado = false;

    private $tecnologia;


    public function __construct()
    {
        $user = Auth::user();
        if ($user->can('Tecnologias')) {
            $this->autorizado = true;
        } else {
            flash('Você não tem acesso suficiente')->error();
        }
    }


    public function pesquisa(Request $request)
    {
        $tecnologias = Tecnologia::search($request->texto)->with('subtemas', 'categoria', 'instituicao', 'publicos',
            'temaPrincipal', 'temaSecundario')->get();
        dd($tecnologias);
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
        $publicosAlvo = PublicosAlvo::all();
        $tecnologia = new Tecnologia();
        $propssubtemas1 = new SubTemas();
        $propssubtemas2 = new SubTemas();

        return view('admin.tecnologias.create',
            compact('categorias', 'temas', 'tecnologia', 'propssubtemas1', 'propssubtemas2', 'publicosAlvo'));
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

        DB::transaction(function () use ($request) {

            $instituicaoId = $request['instituicao_id'];
            $instituicao = Instituicao::find($instituicaoId); //TODO tratamento de erro

            $id = Tecnologia::max('id');
            $id = ($id == null) ? 1 : $id;
            if (is_null($request['numeroInscricao'])) {
                $request['numeroInscricao'] = Carbon::now()->year.'/'.($id + 1);
            }

            $input = $request->except([
                'subtema1',
                'subtema2',
                'instituicao_id',
                'responsaveis',
                'locaisImplantacao',
                'PublicoAlvo',
                'instituicoesParceiras',
                'enderecosEletronicos',
                'PublicosAlvo',
            ]);

            //Cria tecnologia
            $this->tecnologia = $instituicao->tecnologias()->create($input);

            //Grava os subtemas principais
            $inputs = $request->only('subtema1');
            $inputs = $inputs['subtema1'];
            foreach ($inputs as $input) {
                $this->tecnologia->subtemas()->attach($input['id']);
            }

            //Grava os subtemas secundários
            $inputs = $request->only('subtema2');
            $inputs = $inputs['subtema2'];
            foreach ($inputs as $input) {
                $this->tecnologia->subtemas()->attach($input['id']);
            }

            $responsaveis = $request->only('responsaveis');
            $inputs = $responsaveis['responsaveis'];
            foreach ($inputs as $input) {
                $this->tecnologia->responsaveis()->create($input);//TODO tratamento de erro
            }

            $locais = $request->only('locaisImplantacao');
            $inputs = $locais['locaisImplantacao'];
            foreach ($inputs as $input) {
                $this->tecnologia->locais()->create($input);
            }

            $publico = $request->only('PublicosAlvo');
            $inputs = $publico['PublicosAlvo'];
            foreach ($inputs as $input) {
                $this->tecnologia->publicos()->attach($input['id']);
            }

            $publico = $request->only('instituicoesParceiras');
            $inputs = $publico['instituicoesParceiras'];
            foreach ($inputs as $input) {
                $this->tecnologia->instituicoesParceiras()->create($input);
            }

            $publico = $request->only('enderecosEletronicos');
            $inputs = $publico['enderecosEletronicos'];
            foreach ($inputs as $input) {
                $this->tecnologia->enderecosEletronico()->create($input);
            }
        });
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

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnologia $tecnologia
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if ( ! $this->autorizado) {
            return back();
        }

        $tecnologia = Tecnologia::find($id);

        //Carrega dados nescessários para o Form
        $publicosAlvo = PublicosAlvo::all();
        $categorias = Categoria::all();
        $temas = Temas::all();
        return view('admin.tecnologias.edit', compact('tecnologia', 'categorias', 'temas', 'publicosAlvo'));
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
            $tecnologia->subtemas()->sync($input);//TODO tratamento de erro
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
    public function destroy($id)
    {
        try {
            Tecnologia::find($id)->delete();
            flash('Tecnologia deletada com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
                Log::error($e->getMessage());
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
                Log::error($e->getMessage());
            }

        }

        return redirect(route('indexTecnologias'));
    }


    private function DadosForm()
    {
    }
}
