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
            <th>ID</th>
            <th>Descrição</th>
            <th>Data de encerramento</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($temas as $tema)
                <th scope="row">{{$tema->id}}</th>
                <td>{{$tema->nome}}</td>
                <td>{{$tema->created_at}}</td>
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
