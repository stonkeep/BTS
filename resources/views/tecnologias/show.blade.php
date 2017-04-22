{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tecnologias')

@section('content_header')
    <h1>Tecnologias</h1>
@stop

@section('content')
    <div>
        <a href="/tecnologias/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Data de Criação</th>
            <th>Instituição</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnologias as $tecnologia)
            <tr>
                <th scope="row">{{$tecnologia->id}}</th>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop