{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    @include('flash::message')
    <div>
        <a href="/categorias/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table data-toggle="table"
           data-search="true"
           data-show-pagination-switch="true"
           data-search-accent-neutralise="true"
           data-locale="pt-BR">
        <thead>
        <tr>
            <th  data-sortable="true">Item ID</th>
            <th data-sortable="true">Descrição</th>
            <th  data-sortable="false"></th>
            <th  data-sortable="false"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td scope="row">{{$categoria->id}}</td>
                <td>{{$categoria->descricao}}</td>
                <td><a class="btn btn-danger" href="/categorias/delete/{{$categoria->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/categorias/edit/{{$categoria->id}}">Editar</a></td>

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