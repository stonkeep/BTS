{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sub Temas')

@section('content_header')
    <h1>Sub Temas</h1>
@stop

@section('content')
    <div>
        <a href="/subtemas/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data de encerramento</th>
            <th>Tema</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subTemas as $subTema)

            <tr>
                <th scope="row">{{$subTema->id}}</th>
                <td>{{$subTema->descricao}}</td>
                <td>{{$subTema->created_at}}</td>
                <td>{{$subTema->tema->nome}}</td>
                <td><a class="btn btn-danger" href="/subtemas/delete/{{$subTema->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/subtemas/edit/{{$subTema->id}}">Editar</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop


@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop