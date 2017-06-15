<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NaturezasJuridicas;
use Auth;
use Illuminate\Http\Request;

class NaturezasJuridicasController extends Controller
{

    private $autorizado = true;
    public function __construct()
    {
        $user = Auth::user();
        if ( ! $user->hasPermissionTo('NaturezaJuridica')) {
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

        $data = NaturezasJuridicas::all();
        return view('admin.naturezasJuridicas.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.naturezasJuridicas.create');
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
            'descricao' => 'required|unique:naturezas_juridicas',
        ]);
        
        NaturezasJuridicas::create($request->all());
        return redirect(route('naturezasJuridicas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function show(NaturezasJuridicas $naturezasJuridicas)
    {
        $naturezas = NaturezasJuridicas::all();
        return view('admin.naturezasJuridicas.show', compact('naturezas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $natureza = NaturezasJuridicas::find($id);
        if (!$this->autorizado){
            return back();
        }
        return view('admin.naturezasJuridicas.edit', compact('natureza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $natureza = NaturezasJuridicas::find($id);
        $natureza->update($request->all());
        flash('Natureza Jurídica atualizada com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            NaturezasJuridicas::find($id)->delete();
            flash('Natureza Jurídica deletada com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }

        return redirect(route('naturezasJuridicas.index'));
    }
}
