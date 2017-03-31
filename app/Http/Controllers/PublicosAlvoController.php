<?php

namespace App\Http\Controllers;

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
        PublicosAlvo::create($request->all());

        $publicos = PublicosAlvo::all();

        return view('publicosAlvo.show', compact('publicos'));
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

        return view('publicosAlvo.show', compact('publicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicosAlvo $publicosAlvo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicosAlvo $publicosAlvo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicosAlvo  $publicosAlvo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicosAlvo $publicosAlvo)
    {
        //
    }
}
