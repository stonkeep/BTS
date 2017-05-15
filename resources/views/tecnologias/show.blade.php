{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tecnologias')

@section('content_header')
    <h1>Tecnologias</h1>
@stop

@section('content')

    {{--@include('flash::message')--}}
    <div>
        <a href="/tecnologias/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table data-toggle="table"
           data-search="true"
           data-show-pagination-switch="true"
           data-search-accent-neutralise="true"
           data-locale="pt-BR">
        <thead >
        <tr>
            <th data-sortable="true">ID</th>
            <th data-sortable="true">Título</th>
            <th data-sortable="true">Data de Criação</th>
            <th data-sortable="true">Instituição</th>
            <th  data-sortable="false"></th>
            <th  data-sortable="false"></th>

        </tr>
        </thead>
        <tbody>
        @foreach($tecnologias as $tecnologia)
            <tr>
                <td>{{$tecnologia->id}}</td>
                <td>{{$tecnologia->titulo}}</td>
                <td>{{$tecnologia->created_at}}</td>
                <td>{{$tecnologia->instituicao->razaoSocial}}</td>
                <td><a class="btn btn-danger" href="/tecnologias/delete/{{$tecnologia->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/tecnologias/edit/{{$tecnologia->id}}">Editar</a></td>
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
    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@stop