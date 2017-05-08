{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Premio')

@section('content_header')
    <h1>Premio</h1>
@stop

@section('content')

    {{--<div id="app">--}}

        {{--<table-example :categorias="{{$categorias}}"></table-example>--}}
        {{--<br>--}}
        {{--<my-vuetable :categorias="{{$categorias}}"></my-vuetable>--}}
    {{--</div>--}}

    <table data-toggle="table"
           data-search="true"
           {{--data-show-columns="true"--}}
           data-show-pagination-switch="true"
           {{--data-show-export="true"--}}
           {{--data-strict-search="true"--}}
           data-search-accent-neutralise="true"
           {{--data-show-toggle="true"--}}
           data-locale="pt-BR">
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">Item ID</th>
            <th data-field="name" data-sortable="true">Item Name</th>
            <th data-field="price" data-sortable="true">Item Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Água</td>
            <td>$1</td>
        </tr>
        <tr>
            <td>2</td>
            <td>C</td>
            <td>$1</td>
        </tr>
        <tr>
            <td>3</td>
            <td>B</td>
            <td>$2</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Agro</td>
            <td>$2</td>
        </tr>
        </tbody>
    </table>

@stop


@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>--}}

    <!-- Latest compiled and minified Locales -->
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-pt-BR.js"></script>--}}

    {{--<script src="js/bootstrap-table-accent-neutralise.js"></script>--}}
    <script src="/js/app.js"></script>
    {{--<script src="/js/bootstrap-table.js"></script>--}}
    {{--<script src="/js/bootstrap-table-accent-neutralise.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#example').DataTable();--}}
        {{--});--}}
    {{--</script>--}}
@stop