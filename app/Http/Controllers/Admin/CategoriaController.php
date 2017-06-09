<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class CategoriaController extends Controller
{

    private $autorizado = true;


    public function __construct()
    {
        $user = Auth::user();
        if ($user) {
            if ( ! $user->can('Categorias')) {
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
        if ( ! $this->autorizado) {
            return back();
        }
        $data = Categoria::all();

        return view('admin.categorias.show', compact('data'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            'descricao' => 'required|unique:categorias',
        ]);

        Categoria::create($request->all());

        return redirect('categorias');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria $categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria $categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $user = Auth::user();
        if ( ! $user->can('Categorias')) {
            flash('Você não tem acesso suficiente')->error();

            return redirect('/');
        }

        return view('admin.categorias.edit', compact('categoria'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Categoria           $categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $this->validate($request, [
            'descricao' => 'required',
        ]);
        $categoria->update($request->all());
        flash('Categoria atualizada com sucesso')->success();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria $categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            flash('Categoria deletado com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                dd('entrou aqui');
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }

        }

        return redirect(route('indexCategorias'));
    }
}
