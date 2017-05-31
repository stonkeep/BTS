<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategoria;
use Illuminate\Http\Request;

class PostCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostCategoria::all();

        return view('admin.post-categorias.show', compact('data'));
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
            'descricao' => 'required|unique:categorias',
        ]);

        PostCategoria::create($request->all());
        return redirect(route('indexPostCategorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategoria $postCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategoria $postCategoria)
    {
        return view('admin.post-categorias.edit.edit', compact('postCategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategoria $postCategoria)
    {
        $this->validate($request, [
            'descricao' => 'required',
        ]);

        try {
            $postCategoria->update($request->all());
            flash('Categoria atualizada com sucesso')->success();
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategoria $postCategoria)
    {
        try {
            $postCategoria->delete();
            flash('Categoria deletado com sucesso')->success();
        } catch (\Exception $e) {
            flash('Erro '.$e->getCode().' ocorreu. Favor verificar com a administração do sistema')->error();
        }
        return redirect(route('indexPostCategorias'));
    }
}
