{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Publico Alvo')

@section('content_header')
    <h1>Publico Alvo</h1>
@stop

@section('content')
    <div>
        <a href="/admin/publicosAlvo/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Edição</th>
            <th>Descrição</th>
            <th>Data de Criação</th>
            <th>Data de Atualização</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publicos as $publico)
            <tr>
                <th scope="row">{{$publico->id}}</th>
                <td>{{$publico->descricao}}</td>
                <td>{{$publico->created_at}}</td>
                <td>{{$publico->updated_at}}</td>
                <td><a class="btn btn-danger" href="/publicosAlvo/delete/{{$publico->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/publicosAlvo/edit/{{$publico->id}}">Editar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
