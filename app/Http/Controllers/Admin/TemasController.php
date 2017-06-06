<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Temas;
use Auth;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class TemasController extends Controller
{
    private $autorizado = true;
    public function __construct()
    {
        $user = Auth::user();
        if (!$user->can('Temas')) {
            flash('Você não tem acesso suficiente')->error();
            $this->autorizado = false;
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

        $data = Temas::all();
        return view('admin.temas.show', compact('data'));
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|unique:temas',
        ]);

        Temas::create($request->all());
        $data = Temas::all();

        return view('admin.temas.show', compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Temas $temas
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Temas $temas)
    {
        $data = Temas::all();

        return view('admin.temas.show', compact('data'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temas $temas
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Temas $tema)
    {
        if (!$this->autorizado){
            return back();
        }
        return view('admin.temas.edit', compact('tema'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Temas               $temas
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temas $tema)
    {
        $tema->update($request->all());
        flash('Tema atualizado com sucesso')->success();
//        $temas = Temas::all();
//
//        return view('admin.temas.show', compact('temas'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temas $temas
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temas $tema)
    {
        try {
            $tema->delete();
            flash('Tema deletado com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }

        return redirect(route('indexTemas'));
    }
}
