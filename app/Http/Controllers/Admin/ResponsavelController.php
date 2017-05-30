<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsaveis = Responsavel::all();

        return view('admin.responsaveis.show', compact('responsaveis'));
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
            'nome' => 'required',
            'telefone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Responsavel::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Responsavel  $responsavel
     * @return \Illuminate\Http\Response
     */
    public function show(Responsavel $responsavel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Responsavel  $responsavel
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsavel $responsavel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Responsavel  $responsavel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsavel $responsavel)
    {
        $responsavel->update($request->all());
        flash('Responsável atualizado com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Responsavel  $responsavel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responsavel $responsavel)
    {
        $responsavel->delete();
        flash('Responsável deletado com sucesso')->success();
    }
}
