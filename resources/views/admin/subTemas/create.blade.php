{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sub Temas')

@section('content_header')
    <h1>Sub Temas</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
        <form action="/subtemas/create" method="POST">
            {{ csrf_field() }}

            <subtema :temas="{{$temas}}" :subTema="{{$subTema}}"></subtema>

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