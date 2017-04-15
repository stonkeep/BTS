{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')
    <form action="/regioes/create" method="POST">
        {{ csrf_field() }}
        <div>
            <label for="sigla">Sigla: </label>
            <input type="text" name="sigla">
        </div>
        <div>
            <label for="sigla">Descricao: </label>
            <input type="text" name="descricao">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop