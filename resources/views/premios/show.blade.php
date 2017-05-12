{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')
    <div>
        <a href="/premios/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <table id="table" data-toggle="table"
               data-search="true"
               data-show-columns="true"
               data-show-refresh="true"
               data-search-accent-neutralise="true"
               data-locale="pt-BR"
               data-pagination="true"
               data-show-pagination-switch="true">
            <thead class="thead-inverse">
        <tr>
            <th>Edição</th>
            <th>Data de Abertura</th>
            <th>Data de encerramento</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($premios as $premio)
        <tr>
                <th scope="row">{{$premio->edicao}}</th>
                <td>{{$premio->data_abertura}}</td>
                <td>{{$premio->data_encerramento}}</td>
                <td>{{$premio->encerrado ? 'Sim' : 'Não'}}</td>
            <td><a class="btn btn-danger" href="/premios/delete/{{$premio->id}}">Excluir</a></td>
            <td><a class="btn btn-success" href="/premios/edit/{{$premio->id}}">Editar</a></td>
        </tr>
        @endforeach

        </tbody>
    </table>
@stop


@section('css')
            <link rel="stylesheet" href="/css/app.css">
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
            <script src="/js/app.js"></script>
            <script>
                $('#table').bootstrapTable({
                    cache: false,
                    height: 500,
                    striped: true,
                    pagination: true,
                    pageSize: 10,
                    pageList: [All], //list can be specified here
                    searchTimeOut: 10
                });@stop
