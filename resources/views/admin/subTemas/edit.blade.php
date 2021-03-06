{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sub Temas')

@section('content_header')
    <h1>Sub Temas</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
        {{ csrf_field() }}

         <subtema :subtema="{{$subTema}}" :temas="{{$temas}}"></subtema>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop