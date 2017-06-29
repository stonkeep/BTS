{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Instituições')

@section('content_header')
    <h1>Instituições</h1>
@stop

@section('content')

    <div id="app">

        <instituicao
                :naturezajuridicaoptions="{{$naturezaJuridicaOptions}}"
                :cargooptions="{{$cargooptions}}">

        </instituicao>


    </div>

@stop


@section('css')
@stop

@section('js')
    <!-- Scripts -->
    <script src="/js/app.js"></script>
@stop