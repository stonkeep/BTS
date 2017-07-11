{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tecnologias')

@section('content_header')
    <h1>Tecnologias</h1>
@stop

@section('content')
    @php
        $colunas = collect(['id', 'Título', 'Data de Criação', 'Data de Atualização']);
     $tipo = 'tecnologias' ;
    @endphp
    <div id="app">
        <div>
            <a href="/admin/{{$tipo}}/insert" class="btn btn-primary">NOVO</a>
        </div>
        <table id="table"
               {{--data-toggle="table"--}}
               data-search="true"
               data-show-columns="true"
               data-search-accent-neutralise="true"
               data-locale="pt-BR"
                {{--data-query-params="queryParams"--}}
                {{--data-page-size="10"--}}
                {{--data-page-list="[10, 25, 50, 100]"--}}
                {{--data-page-list="[10]"--}}
        >
            <thead class="thead-inverse">
            <tr>
                {{--                @foreach($colunas as $coluna)--}}
                {{--<th data-sortable="true">{{$coluna}}</th>--}}
                {{--<th data-sortable="true" data-field="id">ID</th>--}}
                {{--<th data-sortable="true" data-field="titulo">Título</th>--}}
                {{--<th data-sortable="true" data-field="created_at">Criado em</th>--}}
                {{--<th data-sortable="true" data-field="updated_at">Atualizado em</th>--}}
                {{--@endforeach--}}

                {{--<th data-sortable="false"--}}
                    {{--data-switchable="false"></th>--}}
                {{--<th data-sortable="false"--}}
                    {{--data-switchable="false"></th>--}}
            </tr>
            </thead>
            {{--<tbody>--}}
            {{--@foreach($data as $item)--}}
            {{--<tr>--}}
            {{--<td>{{$item->id}}</td>--}}
            {{--<td>{{$item->titulo}}</td>--}}
            {{--<td>{{$item->created_at}}</td>--}}
            {{--<td>{{$item->updated_at}}</td>--}}
            {{--<td><a class="btn btn-danger" href="/admin/{{$tipo}}/delete/{{$item->id}}">Excluir</a></td>--}}
            {{--<td><a class="btn btn-success" href="{{route('editTecnologias', $item->id)}}">Editar</a></td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        </table>
        {{--            {{$data->links()}}--}}
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@stop

@section('js')
    <script src="/js/app.js"></script>
    <script>
        let pageSize = 10;
        let page = 1;
        let url = '/api/tecnologias?pagesize=' + pageSize + '&page=' + page;

        $('#table').bootstrapTable({
            columns: [{
                field: 'id',
                title: 'ID',
            }, {
                field: 'titulo',
                title: 'Título',
            }, {
                field: 'created_at',
                title: 'Criado em'
            }, {
                field: 'updated_at',
                title: 'Atualizado em'
            }, {
                field: '',
                title: '',
                switchable: false,
                formatter : function(value,row,index) {
                    return '<a class="btn btn-danger" href="/admin/{{$tipo}}/delete/' + row.id +  '">Excluir</a>';
                }

            }, {
                field: '',
                title: '',
                switchable: false,
                formatter : function(value,row,index) {
                    return '<a class="btn btn-success" href="/admin/{{$tipo}}/edit/' + row.id +  '">Editar</a>';
                }

            }],
            cache: false,
            height: 500,
            striped: true,
            searchOnEnterKey: true,
            url: url,
            pageSize: pageSize,
            totalField: 'total',
            dataField: 'data',
            sidePagination: 'server',
            pagination: true,
            pageList: [10, 25, 50, 100],
            search: true,
            searchText: '',
            sortable: "true",
            searchTimeOut: 500,
            silent: true
        });


        $('#table').on('search.bs.table', function (e, text) {
            url = '/api/tecnologias?pagesize=' + pageSize + '&page=' + page + '&text=' + text;
            $('#table').bootstrapTable('refresh', {
                url: url,
                pageSize: pageSize,
                pageNumber: page
            });
        });

        $('#table').on('page-change.bs.table', function (e, number, size) {
            page = number;
            pageSize = size;
            url = '/api/tecnologias?pagesize=' + pageSize + '&page=' + page;
            $('#table').bootstrapTable('refresh', {
                url: url,
                pageSize: pageSize,
                pageNumber: page
            });
//            console.log(url);

        });

    </script>
@stop