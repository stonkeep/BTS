{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Cargos</h1>
@stop

@section('content')
    @php
        $colunas = collect(['id', 'Descrição', 'Data de Criação', 'Data de Atualização']);
    @endphp
    <div id="app">
        <bts-table :data="{{$cargos}}" :tipo="'cargos'" :colunas="{{$colunas}}"></bts-table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop