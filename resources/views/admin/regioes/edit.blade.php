{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
    <form action="/regioes/update/{{$regiao->id}}" method="PUT">
        {{ csrf_field() }}
         <regiao id="{{$regiao->id}}" sigla="{{$regiao->sigla}}" descricao="{{$regiao->descricao}}"></regiao>
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