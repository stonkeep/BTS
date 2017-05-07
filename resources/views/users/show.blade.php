{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Premio')

@section('content_header')
    <h1>Premio</h1>
@stop

@section('content')

    <div id="app">

        <table-example :categorias="{{$categorias}}"></table-example>
    </div>

@stop


@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script src="/js/app.js"></script>
    <script>

//        $(document).ready(function () {
//            $('#example').DataTable();
//        });
    </script>
@stop