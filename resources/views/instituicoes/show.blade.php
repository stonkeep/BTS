@extends('layouts.master')

@section('body')
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>CNPJ</th>
            <th>Natureza Juridica</th>
            <th>Nome da Area</th>
            <th>ddd</th>
            <th>telefone</th>
            <th>email</th>
            <th>UF</th>
            <th>cidade</th>
            <th>endereco</th>
            <th>bairro</th>
            <th>CEP</th>
            <th>site</th>
            <th>nomeCompleto</th>
            <th>cargos_id</th>
            <th>sexo</th>
            <th>CPF</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($instituicoes as $instituicao)
                <th scope="row">{{$instituicao->id}}</th>
                <td>{{$instituicao->CNPJ}}</td>
                <td>{{$instituicao->natureza->descricao}}</td>
                <td>{{$instituicao->nomeDaArea}}</td>
                <td>{{$instituicao->ddd}}</td>
                <td>{{$instituicao->telefone}}</td>
                <td>{{$instituicao->UF}}</td>
                <td>{{$instituicao->cidade}}</td>
                <td>{{$instituicao->endereco}}</td>
                <td>{{$instituicao->bairro}}</td>
                <td>{{$instituicao->CEP}}</td>
                <td>{{$instituicao->site}}</td>
                <td>{{$instituicao->nomeCompleto}}</td>
                <td>{{$instituicao->cargo->descricao}}</td>
                <td>{{$instituicao->sexo}}</td>
                <td>{{$instituicao->CPF}}</td>
                <td>{{$instituicao->created_at}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>

@endsection