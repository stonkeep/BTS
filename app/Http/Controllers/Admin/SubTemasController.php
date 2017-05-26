<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\SubTemas;
use App\Temas;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class SubTemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subTemas = SubTemas::all();
        return view('admin.subTemas.show', compact('subTemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temas = Temas::all()->toJson();
        $subTema = new SubTemas;

        return view('admin.subTemas.create', compact('temas', 'subTema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'tema_id' => 'required|exists:temas,id',
            'descricao' => 'required|unique:sub_temas'
        ]);

        $tema = Temas::find($request->tema_id);

        if ($tema) {
            SubTemas::create($request->all());
        }else{
            return 'Não foi possível encontrar tema para vincular';
        }        
            
        $subTemas = SubTemas::all();
        return view('admin.subTemas.show', compact('subTemas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function show(SubTemas $subTemas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTemas $subTema)
    {
        $temas = Temas::all();
        return view('admin.subtemas.edit', compact('subTema', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTemas $subTema)
    {
        //dd($subTema);
        $subTema->update($request->all());
        $subTemas = SubTemas::all();
        return view('admin.subTemas.show', compact('subTemas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTemas $subTema)
    {
//        dd($subTema);
        $subTema->delete();
        $subTemas = SubTemas::all();
        return view('admin.subtemas.show', compact('subTemas'));
    }
}
