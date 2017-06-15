{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Cartegoria</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
        {{ csrf_field() }}
         <categoria id="{{$categoria->id}}" descricao="{{$categoria->descricao}}"></categoria>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop