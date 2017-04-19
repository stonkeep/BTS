{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
    <form action="/temas/update/{{$tema->id}}" method="PUT">
        {{ csrf_field() }}
         <tema id="{{$tema->id}}" nome="{{$tema->nome}}"></tema>
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