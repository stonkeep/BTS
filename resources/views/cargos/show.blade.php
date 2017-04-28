{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Cargos</h1>
@stop

@section('content')

    <div>
        <a href="/cargos/insert" class="btn btn-primary">NOVO</a>
    </div>
    <table  id="table_id" class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Descrição</th>
        <th>Data de atualização</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cargos as $cargo)
        <tr>

            <th scope="row">{{$cargo->id}}</th>
            <td>{{$cargo->descricao}}</td>
            <td>{{$cargo->updated_at}}</td>
            <td><a class="btn btn-danger" href="/cargos/delete/{{$cargo->id}}">Excluir</a></td>
            <td><a class="btn btn-success" href="/cargos/edit/{{$cargo->id}}">Editar</a></td>
        </tr>
    @endforeach

    </tbody>
    </table>
    {{ $cargos->links() }}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop