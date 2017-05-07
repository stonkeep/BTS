{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')
    <div>
        <a href="/temas/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table id="example" class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data de criação</th>
            <th>Data de Atualização</th>
        </tr>
        </thead>
        <tbody>
        @foreach($temas as $tema)
            <tr>
                <th scope="row">{{$tema->id}}</th>
                <td>{{$tema->nome}}</td>
                <td>{{$tema->created_at}}</td>
                <td>{{$tema->updated_at}}
                <td><a class="btn btn-danger" href="/temas/delete/{{$tema->id}}">Excluir</a></td>
                <td><a class="btn btn-success" href="/temas/edit/{{$tema->id}}">Editar</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div id="app"> <example></example></div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
