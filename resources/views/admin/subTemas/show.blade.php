{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sub Temas')

@section('content_header')
    <h1>Sub Temas</h1>
@stop

@section('content')
    <div id="app">
        <div>
            <a href="/admin/subtemas/insert" class="btn btn-primary">NOVO</a>
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
                <th data-sortable="true">ID</th>
                <th data-sortable="true">Descrição</th>
                <th data-sortable="true">Data de encerramento</th>
                <th data-sortable="true">Tema</th>
                <th data-sortable="false"
                    data-switchable="false"></th>
                <th data-sortable="false"
                    data-switchable="false"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($subTemas as $subTema)
                <tr>
                    <td>{{$subTema->id}}</td>
                    <td>{{$subTema->descricao}}</td>
                    <td>{{$subTema->created_at}}</td>
                    <td>{{$subTema->tema->nome}}</td>
                    <td><a class="btn btn-danger" href="/subtemas/delete/{{$subTema->id}}">Excluir</a></td>
                    <td><a class="btn btn-success" href="/subtemas/edit/{{$subTema->id}}">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

@stop

@section('js')
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>--}}
    <script src="/js/app.js"></script>
    <script>
        $('#table').bootstrapTable({
            cache: false,
            height: 500,
            striped: true,
//            pagination: true,
//            pageSize: 10,
//            pageList: [All], //list can be specified here
            searchTimeOut: 10
        });
    </script>
@stop