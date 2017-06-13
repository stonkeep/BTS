<?php

namespace App\Http\Controllers\Admin;

use App\Cargos;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class CargosController extends Controller
{

    private $autorizado = true;
    
    public function __construct()
    {
        //verifica se usuário tem acesso ao controle
        $user = Auth::user();
        if ( ! $user->hasPermissionTo('Cargos')) {
            //if (!$user->can('Cargos')) {
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
        if ( ! $this->autorizado) {
            return back();
        }

        $data = Cargos::all();
        return view('admin.cargos.show', compact('data', 'colunas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( ! $this->autorizado) {
            return back();
        }

        return view('admin.cargos.create');
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
            'descricao' => 'required|unique:cargos',
        ]);

        Cargos::create($request->all());

        $data = Cargos::all();
        flash('Cargo gravado com sucesso')->success();

        return view('admin.cargos.show', compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cargos $cargos
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Cargos $cargos)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargos $cargos
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargos::find($id);

        if ( ! $this->autorizado) {
            return back();
        }

        return view('admin.cargos.edit', compact('cargo'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cargos              $cargos
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cargo = Cargos::find($id);

        $this->validate($request, [
            'descricao' => 'required',
        ]);

        try {
            $cargo->update($request->all());
            flash('Cargo atualizado com sucesso')->success();
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargos $cargos
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Cargos::find($id)->delete();
            flash('Cargo deletado com sucesso')->success();
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") { //23000 is sql code for integrity constraint violation
                flash('Resgistro tem dependência, Favor verificar as ligaçõe')->error();
            } else {
                flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
            }

        }
        
        return redirect(route('cargos.index'));
    }
}
