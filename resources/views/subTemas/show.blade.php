@extends('layouts.master')

@section('body')
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data de encerramento</th>
            <th>Tema</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($subTemas as $subTema)
                <th scope="row">{{$subTema->id}}</th>
                <td>{{$subTema->descricao}}</td>
                <td>{{$subTema->created_at}}</td>
                <td>{{$subTema->tema->nome}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>

@endsection