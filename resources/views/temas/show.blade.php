@extends('layouts.master')

@section('body')
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data de encerramento</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($temas as $tema)
                <th scope="row">{{$tema->id}}</th>
                <td>{{$tema->nome}}</td>
                <td>{{$tema->created_at}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>

@endsection