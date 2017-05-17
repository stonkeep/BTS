{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Instituições')

@section('content_header')
    <h1>Instituições</h1>
@stop

@section('content')

    <div>
        <a href="/instituicoes/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table data-toggle="table"
           data-search="true"
           data-show-pagination-switch="true"
           data-search-accent-neutralise="true"
           data-locale="pt-BR">
        <thead class="thead-inverse">
        <tr>
            <th data-sortable="true">ID</th>
            <th data-sortable="true">CNPJ</th>
            <th data-sortable="true">razaoSocial</th>
            <th data-sortable="true">Natureza Juridica</th>
            <th  data-sortable="false"></th>
            <th  data-sortable="false"></th>

        </tr>
        </thead>
        <tbody>
        @foreach($instituicoes as $instituicao)
            <tr>
                <td>{{$instituicao->id}}</td>
                <td>{{$instituicao->CNPJ}}</td>
                <td>{{$instituicao->razaoSocial}}</td>
                <td>{{$instituicao->natureza->descricao}}</td>
                <td><a class="btn btn-danger" href="/instituicoes/delete/{{$instituicao->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/instituicoes/edit/{{$instituicao->id}}">Editar</a></td>
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