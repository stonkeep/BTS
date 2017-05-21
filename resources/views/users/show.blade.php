{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Teste')

@section('content_header')
    <h1>Teste table</h1>
@stop

@section('content')

    <div id="app">
        <table-example :data="{{$categorias}}" :tipo="'categorias'"></table-example>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
    {{--<script>--}}
        {{--$('#table').bootstrapTable({--}}
            {{--cache: false,--}}
            {{--height: 500,--}}
            {{--striped: true,--}}
            {{--pagination: true,--}}
            {{--pageSize: 10,--}}
            {{--pageList: [All], //list can be specified here--}}
            {{--searchTimeOut: 10--}}
        {{--});--}}
    {{--</script>--}}
@stop