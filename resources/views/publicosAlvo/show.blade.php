@extends('layouts.master')

@section('body')
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Edição</th>
            <th>Data de Abertura</th>
            <th>Data de encerramento</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($publicos as $publico)
                <th scope="row">{{$publico->id}}</th>
                <td>{{$publico->descricao}}</td>
                <td>{{$publico->created_at}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
    @endsection