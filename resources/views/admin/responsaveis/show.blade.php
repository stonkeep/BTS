{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')
    <div>
        <a href="/admin/regioes/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>nome</th>
            <th>telefone</th>
            <th>E-mail</th>

        </tr>
        </thead>
        <tbody>
        @foreach($responsaveis as $responsavel)
            <tr>
                <th scope="row">{{$responsavel->id}}</th>
                <td>{{$responsavel->nome}}</td>
                <td>{{$responsavel->telefone}}</td>
                <td>{{$responsavel->email}}</td>
                <td><a class="btn btn-danger" href="/regioes/delete/{{$responsavel->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/regioes/edit/{{$responsavel->id}}">Editar</a></td>
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