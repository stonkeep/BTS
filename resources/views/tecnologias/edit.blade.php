{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tecnologias')

@section('content_header')
    <h1>Tecnologias</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
        {{ csrf_field() }}
        <tecnologia id="{{$tecnologia->id}}" descricao="{{$tecnologia->descricao}}"></tecnologia>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop