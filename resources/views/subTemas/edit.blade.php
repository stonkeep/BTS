{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sub Temas')

@section('content_header')
    <h1>Sub Temas</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
    <form action="/cargo/update/{{$subTema->id}}" method="PUT">
        {{ csrf_field() }}
         <cargo id="{{$subTema->id}}" descricao="{{$subTema->descricao}}"></cargo>
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