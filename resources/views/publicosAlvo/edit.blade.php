{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Publico Alvo')

@section('content_header')
    <h1>Publico Alvo</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
    <form action="/publicosAlvo/update/{{$publico->id}}" method="PUT">
        {{ csrf_field() }}
         <publicoalvo id="{{$publico->id}}" descricao="{{$publico->descricao}}"></publicoalvo>
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