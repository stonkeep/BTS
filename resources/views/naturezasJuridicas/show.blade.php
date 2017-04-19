{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Naturezas Juridicas')

@section('content_header')
    <h1>Naturezas Juridicas</h1>
@stop

@section('content')
    <div>
        <a href="/naturezasJuridicas/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Edição</th>
            <th>Descrição</th>
            <th>Data de criação</th>
            <th>Data de alteração</th>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop