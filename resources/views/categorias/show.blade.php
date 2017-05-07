{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <div>
        <a href="/categorias/insert" class="btn btn-primary">NOVO</a>
    </div>


    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <th scope="row">{{$categoria->id}}</th>
                <td>{{$categoria->descricao}}</td>
                <td><a class="btn btn-danger" href="/categorias/delete/{{$categoria->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/categorias/edit/{{$categoria->id}}">Editar</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @include('layouts.erros')
    {{--<div id="app">--}}
        {{--{{ csrf_field() }}--}}
        {{--<table-categorias></table-categorias>--}}

    {{--</div>--}}


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css" media="screen" title="no title" charset="utf-8">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js" charset="utf-8"></script>
@stop