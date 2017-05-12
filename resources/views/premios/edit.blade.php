{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Premio')

@section('content_header')
    <h1>Premio</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
        {{ csrf_field() }}
        <premio :premio="{{$premio}}"></premio>

    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop