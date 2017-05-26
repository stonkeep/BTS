{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Cargo</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
    <form action="/cargo/update/{{$cargo->id}}" method="PUT">
        {{ csrf_field() }}
         <cargo id="{{$cargo->id}}" descricao="{{$cargo->descricao}}"></cargo>
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