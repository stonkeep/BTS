<?php

namespace App\Http\Controllers;

use App\VigenciasPremio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VigenciasPremioController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        VigenciasPremio::create([
            'edicao' => 2017,
            'data_abertura' => Carbon::now()->toDateTimeString(),
            'data_encerramento' => Carbon::now()->toDateTimeString(),
            'encerrado' => false
        ]);
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function show(VigenciasPremio $vigenciasPremio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function edit(VigenciasPremio $vigenciasPremio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VigenciasPremio $vigenciasPremio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VigenciasPremio  $vigenciasPremio
     * @return \Illuminate\Http\Response
     */
    public function destroy(VigenciasPremio $vigenciasPremio)
    {
        //
    }
}
