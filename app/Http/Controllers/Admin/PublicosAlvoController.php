<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PublicosAlvo;
use Illuminate\Http\Request;

class PublicosAlvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PublicosAlvo::all();
        return view('admin.publicosAlvo.show', compact('data'));
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
            'descricao' => 'required|unique:publicos_alvos'    
        ]);
        
        PublicosAlvo::create($request->all());

        $publicos = PublicosAlvo::all();

        return view('admin.publicosAlvo.show', compact('publicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function show(PublicosAlvo $publicosAlvo)
    {
        $publicos = PublicosAlvo::all();
        return view('admin.publicosAlvo.show', compact('publicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicosAlvo $publico)
    {
        return view('admin.publicosAlvo.edit', compact('publico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicosAlvo $publico)
    {
        $publico->update($request->all());
        flash('Publico Alvo atualizado com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicosAlvo $publico)
    {
        $publico->delete();

        flash('Publico Alvo deletado com sucesso')->success();
        return redirect(route('showPublicoAlvo'));
    }
}
