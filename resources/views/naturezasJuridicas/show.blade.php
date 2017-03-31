@extends('layouts.master')

@section('body')
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>Edição</th>
            <th>Descrição</th>
            <th>Data de criação</th>
            <th>Data de alteração</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($naturezas as $natureza)
                <th scope="row">{{$natureza->id}}</th>
                <td>{{$natureza->descricao}}</td>
                <td>{{$natureza->created_at}}</td>
                <td>{{$natureza->updated_at}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
    @endsection