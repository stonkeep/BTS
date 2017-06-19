{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tecnologias')

@section('content_header')
    <h1>Tecnologias</h1>
@stop

@section('content')

    @include('admin.layouts.erros')
    <div id="app">
        <tecnologia :categorias="{{$categorias}}"
                    :temas="{{$temas}}"
                    :propsubtemaprincipal="{{$tecnologia->subtemasPrincipal()}}"
                    :propsubtemasecundario="{{$tecnologia->subtemasSecundario()}}"
                    :tecnologia="{{$tecnologia}}">

        </tecnologia>
    </div>

@stop


@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
    <link rel="stylesheet" href="/css/app.css">

@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop