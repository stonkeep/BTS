{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Naturezas Juridicas')

@section('content_header')
    <h1>Naturezas Juridicas</h1>
@stop

@section('content')
    <div>
        <a href="/admin/naturezasJuridicas/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table id="table" data-toggle="table"
           data-search="true"
           data-show-columns="true"
           data-search-accent-neutralise="true"
           data-locale="pt-BR"
           data-page-size="10"
           data-page-list="[10, 25, 50, 100]"
           data-pagination="true">
        <thead class="thead-inverse">
        <tr>
            <th data-sortable="true">Edição</th>
            <th data-sortable="true">Descrição</th>
            <th data-sortable="true">Data de criação</th>
            <th data-sortable="true">Data de alteração</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($naturezas as $natureza)
            <tr>
                <th scope="row">{{$natureza->id}}</th>
                <td>{{$natureza->descricao}}</td>
                <td>{{$natureza->created_at}}</td>
                <td>{{$natureza->updated_at}}</td>
                <td><a class="btn btn-danger" href="/naturezasJuridicas/delete/{{$natureza->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/naturezasJuridicas/edit/{{$natureza->id}}">Editar</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop