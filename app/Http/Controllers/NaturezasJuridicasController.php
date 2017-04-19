<?php

namespace App\Http\Controllers;

use App\NaturezasJuridicas;
use Illuminate\Http\Request;

class NaturezasJuridicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturezas = NaturezasJuridicas::all();
        return view('naturezasJuridicas.show', compact('naturezas'));
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

        return view('naturezasJuridicas.show', compact('naturezas'));
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
        return view('naturezasJuridicas.show', compact('naturezas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NaturezasJuridicas  $naturezasJuridicas
     * @return \Illuminate\Http\Response
     */
    public function edit(NaturezasJuridicas $natureza)
    {
        return view('naturezasJuridicas.edit', compact('natureza'));
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
        $naturezas = NaturezasJuridicas::all();

        return view('naturezasJuridicas.show', compact('naturezas'));
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

        return view('naturezasJuridicas.show', compact('naturezas'));
    }
}
