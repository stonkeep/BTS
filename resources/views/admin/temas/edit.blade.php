{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    testes
    {{$tema->nome}}
    teste
    <div id="app">
         <tema id="{{$tema->id}}" nome="{{$tema->nome}}"></tema>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop