{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Instituições')

@section('content_header')
    <h1>Instituições</h1>
@stop

@section('content')

    <div id="app">
    <form action="/categorias/create" method="POST">
        {{ csrf_field() }}
        <instituicao></instituicao>

    </form>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop