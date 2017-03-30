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
            <th scope="row">{{$premio->edicao}}</th>
            <td>{{$premio->data_abertura}}</td>
            <td>{{$premio->data_encerramento}}</td>
            <td>{{$premio->encerramento}}</td>
        </tr>
        </tbody>
    </table>

    <ul>
        <li></li>
        <li></li>
        <li></li>
    </ul>


@endsection