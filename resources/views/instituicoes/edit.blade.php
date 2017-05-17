{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Instituições')

@section('content_header')
    <h1>Instituições</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
        {{ csrf_field() }}
         <instituicao id="{{$instituicao->id}}" descricao="{{$instituicao->descricao}}"></instituicao>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop