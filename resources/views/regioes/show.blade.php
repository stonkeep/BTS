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
            @foreach($regioes as $regiao)
                <th scope="row">{{$regiao->edicao}}</th>
                <td>{{$regiao->sigla}}</td>
                <td>{{$regiao->descricao}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>

    <ul>
        <li></li>
        <li></li>
        <li></li>
    </ul>

@endsection