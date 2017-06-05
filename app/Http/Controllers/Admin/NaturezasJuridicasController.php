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
        if (!$user->can('NaturezaJuridica')) {
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
            'descricao' => 'required|unique:naturezas_juridicas',
        ]);
        
        NaturezasJuridicas::create($request->all());

        $naturezas = NaturezasJuridicas::all();

        return view('admin.naturezasJuridicas.show', compact('naturezas'));
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
    public function edit(NaturezasJuridicas $natureza)
    {
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
    public function update(Request $request, NaturezasJuridicas $natureza)
    {
        $natureza->update($request->all());
        flash('Natureza Jurídica atualizada com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function destroy(NaturezasJuridicas $natureza)
    {
        $natureza->delete();
        $naturezas = NaturezasJuridicas::all();

        flash('Natureza Jurídica deletada com sucesso')->success();
        return redirect(route('indexNaturezaJuridica'));
        
    }
}
