{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Naturezas Juridicas')

@section('content_header')
    <h1>Naturezas Juridicas</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
    <form action="/naturezasJuridicas/update/{{$natureza->id}}" method="PUT">
        {{ csrf_field() }}
         <natureza id="{{$natureza->id}}" descricao="{{$natureza->descricao}}"></natureza>
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