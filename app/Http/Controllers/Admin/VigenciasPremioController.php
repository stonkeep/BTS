<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VigenciasPremio;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VigenciasPremioController extends Controller
{
    private $autorizado = true;
    public function __construct()
    {
        $user = Auth::user();
        if ($user) {
            if ( ! $user->can('Premios')) {
                flash('Você não tem acesso suficiente')->error();
                $this->autorizado = false;
            }
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
        $data = VigenciasPremio::all();
        return view('admin.premios.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'edicao' => 'required|unique:vigencias_premios|date_format:Y',
            'data_abertura' => 'required|date|after:yesterday',
            'data_encerramento' => 'required|date|after:yesterday',
        ]);
        
        VigenciasPremio::create($request->all());
        
        $premios = VigenciasPremio::all();
        return view('admin.premios.show', compact('premios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function show(VigenciasPremio $vigenciasPremio)
    {
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function edit(VigenciasPremio $premio)
    {
        if (!$this->autorizado){
            return back();
        }

        return view('admin.premios.edit', compact('premio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VigenciasPremio $premio)
    {
        $this->validate(request(), [
            'edicao' => 'required',
            'data_abertura' => 'required',
            'data_encerramento' => 'required',
        ]);

        $premio->update($request->all());
        flash('Vigência atualizado com sucesso')->success();

//        $premios = VigenciasPremio::all();
//        return view('admin.premios.show', compact('premios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function destroy(VigenciasPremio $premio)
    {
        $premio->delete();
        flash('Vigência deletado com sucesso')->success();
        return redirect(route('indexPremios'));
    }
}
