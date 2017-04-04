<?php

namespace App\Http\Controllers;

use App\SubTemas;
use Illuminate\Http\Request;

class SubTemasController extends Controller
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
        SubTemas::create($request->all());

        $subTemas = SubTemas::all();

        return view('subTemas.show', compact('subTemas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function show(SubTemas $subTemas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTemas $subTemas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTemas $subTemas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTemas $subTemas)
    {
        //
    }
}
