<?php

namespace App\Http\Controllers;

use App\Regioes;
use Illuminate\Http\Request;

class RegioesController extends Controller
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
            'sigla' => 'required|unique:regioes'
        ]);
            
        Regioes::create($request->all());
        $regioes = Regioes::all();

        return view('regioes.show', compact('regioes'));
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

        return view('regioes.show', compact('regioes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function edit(Regioes $regioes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regioes $regiao)
    {
        $regiao->update($request->all());

        $regioes = Regioes::all();
        return view('regioes.show', compact('regioes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regioes  $regioes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regioes $regiao)
    {
        $regiao->delete();

        $regioes = Regioes::all();
        return view('regioes.show', compact('regioes'));        
    }
}
