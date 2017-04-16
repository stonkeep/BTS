{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Regiões')

@section('content_header')
    <h1>Regiões</h1>
@stop

@section('content')

    @include('layouts.erros')
    <div id="app">
    <form action="/regioes/create" method="POST">
        {{ csrf_field() }}
        {{--<div class="form-group">--}}
        {{--<label for="sigla">Sigla: </label>--}}
        {{--<input type="text" name="sigla">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<label for="sigla">Descricao: </label>--}}
        {{--<input type="text" name="descricao">--}}
        {{--</div>--}}
        <regiao></regiao>

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