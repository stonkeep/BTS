@extends('layouts.master')

@section('body')

    table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Descrição</th>
        <th>Data de atualização</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($cargos as $cargo)
            <th scope="row">{{$cargo->id}}</th>
            <td>{{$cargo->descricao}}</td>
            <td>{{$cargo->updated_at}}</td>
        @endforeach
    </tr>
    </tbody>
    </table>

    @endsection