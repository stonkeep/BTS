{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')
    <div>
        <a href="/regioes/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Sigla</th>
            <th>Descrição</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($regioes as $regiao)
                <th scope="row">{{$regiao->id}}</th>
                <td>{{$regiao->sigla}}</td>
                <td>{{$regiao->descricao}}</td>
                <td><a class="btn btn-danger" href="/regioes/delete/{{$regiao->id}}">Excluir</a></td>
            @endforeach
        </tr>
        </tbody>
    </table>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop