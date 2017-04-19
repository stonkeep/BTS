{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Naturezas Juridicas')

@section('content_header')
    <h1>Naturezas Juridicas</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
    <form action="/naturezasJuridicas/create" method="POST">
        {{ csrf_field() }}
        <natureza></natureza>

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