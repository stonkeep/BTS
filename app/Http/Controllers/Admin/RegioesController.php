<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Regioes;
use Auth;
use Illuminate\Http\Request;
use MongoDB\BSON\Javascript;
use Psy\Util\Str;

class RegioesController extends Controller
{
    private $autorizado = true;
    public function __construct()
    {
        $user = Auth::user();
            if ( ! $user->hasPermissionTo('Regioes')) {
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
        if (!$this->autorizado){
            return back();
        }

        $data = Regioes::all();
        return view('admin.regioes.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('admin.regioes.create');
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
            'sigla' => 'required|unique:regioes,sigla',
            'descricao' => 'required'
        ]);
            
        Regioes::create($request->all());
        $data = Regioes::all();
        
        return view('admin.regioes.show', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function show(Regioes $regioes)
    {
        $regioes = Regioes::all();

        return view('admin.regioes.show', compact('regioes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regiao = Regioes::find($id);

        if (!$this->autorizado){
            return back();
        }

        return view('admin.regioes.edit', compact('regiao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sigla' => 'required',
            'descricao' => 'required',
        ]);

        Regioes::find($id)->update($request->all());
        flash('Região atualizada com sucesso')->success();
//        $regioes = Regioes::all();
//        return view('admin.regioes.show', compact('regioes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regioes::find($id)->delete();

        flash('Região deletada com sucesso')->success();
        return redirect(route('indexRegioes'));        
    }

    /**
     * Verifica se a região já existe no banco de dados
     */
    public function check(Request $request)
    {
        $regiao = Regioes::where('sigla', $request->sigla);
        if ($regiao) {
            return $erro = 'Esta região já existe';
        }
    }
}
