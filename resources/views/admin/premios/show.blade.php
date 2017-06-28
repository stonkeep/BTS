{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Premios')

@section('content_header')
    <h1>Premios</h1>
@stop

@section('content')
    @php
        $colunas = collect(['id', 'Edição', 'Data de Abertura', 'Data de Encerramento']);
     $tipo = 'premios' ;
    @endphp
    <div id="app">
        <div>
            <a href="/admin/{{$tipo}}/insert" class="btn btn-primary">NOVO</a>
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
                @foreach($colunas as $coluna)
                    {{--<th data-sortable="true">ID</th>--}}
                    {{--<th data-sortable="true">Descrição</th>--}}
                    {{--<th data-sortable="true">Data de encerramento</th>--}}
                    <th data-sortable="true">{{$coluna}}</th>
                @endforeach

                <th data-sortable="false"
                    data-switchable="false"></th>
                <th data-sortable="false"
                    data-switchable="false"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->edicao}}</td>
                    <td>{{$item->data_abertura}}</td>
                    <td>{{$item->data_encerramento}}</td>
                    <td><a class="btn btn-danger" href="/admin/{{$tipo}}/delete/{{$item->id}}">Excluir</a></td>
                    <td><a class="btn btn-success" href="/admin/{{$tipo}}/edit/{{$item->id}}">Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
    <script>
        $('#table').bootstrapTable({
            cache: false,
            height: 500,
            striped: true,
            searchTimeOut: 10
        });
    </script>
@stop