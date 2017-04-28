{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')
    <table class="table">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
