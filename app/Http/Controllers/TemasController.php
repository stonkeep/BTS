<?php

namespace App\Http\Controllers;

use App\Temas;
use Illuminate\Http\Request;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Temas::all();
        return view('temas.show', compact('temas'));
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
            'nome' => 'required|unique:temas',
        ]);
                
        Temas::create($request->all());
        $temas = Temas::all();
        
        return view('temas.show', compact('temas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temas  $temas
     * @return \Illuminate\Http\Response
     */
    public function show(Temas $temas)
    {
        $temas = Temas::all();
        return view('temas.show', compact('temas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temas  $temas
     * @return \Illuminate\Http\Response
     */
    public function edit(Temas $tema)
    {
        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temas  $temas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temas $tema)
    {
        $tema->update($request->all());
//        $temas = Temas::all();
//
//        return view('temas.show', compact('temas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temas  $temas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temas $tema)
    {
        $tema->delete();
        $temas = Temas::all();
        return view('temas.show', compact('temas'));
    }
}
