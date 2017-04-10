<?php

namespace App\Http\Controllers;

use App\Cargos;
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
        Instituicao::create($request->all());

        $instituicoes = Instituicao::all();
        return view('instituicoes.show', compact('instituicoes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $insticuicao
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicao $insticuicao)
    {
        $instituicoes = Instituicao::all();
        return view('instituicoes.show', compact('instituicoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $insticuicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $insticuicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $insticuicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicao $insticuicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $insticuicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicao $insticuicao)
    {
        //
    }
}
