<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\SubTemas;
use App\Temas;
use Auth;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class SubTemasController extends Controller
{
    private $autorizado = true;
    public function __construct()
    {
        $user = Auth::user();
        if ($user) {
            if ( ! $user->can('SubTemas')) {
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
        if (!$this->autorizado){
            return back();
        }
        
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
    public function edit($id)
    {
        $subTema = SubTemas::find($id);
        if (!$this->autorizado){
            return back();
        }

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
        flash('Sub-Tema atualizado com sucesso')->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTemas  $subTemas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subTema = SubTemas::find($id);
        
        try {
            $subTema->delete();
            flash('Sub-Tema deletado com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }
        }

        return redirect(route('indexSubTemas'));
    }
}
