<template>
    <div>
        <div>
            <a :href="'/'+tipo+'/insert/'" class="btn btn-primary">NOVO</a>
        </div>
        <table id="table" data-toggle="table"
               data-search="true"
               data-show-columns="true"
               data-search-accent-neutralise="true"
               data-locale="pt-BR"
               data-page-size="10"
               data-page-list="[10, 25, 50, 100]"
               data-pagination="true">
            <thead class="thead-inverse">
            <tr>
                <th v-for="(val, key) in colunas"
                    :data-field='key'
                    data-sortable="true">
                    {{val}}
                </th>
                <th data-sortable="false" data-switchable="false"></th>
                <th data-sortable="false" data-switchable="false"></th>
            </tr>


            </thead>

            <tbody>
            <tr v-for="linha in data">
                <td v-for="(val, key, index) in linha">
                    {{linha[key]}}
                </td>
                <td><div><button v-on:click="apaga" class="btn btn-danger" :href="'/'+tipo+'/delete/' + linha.id">Excluir</button></div></td>
                <td><a class="btn btn-success" :href="'/'+tipo+'/edit/' + linha.id">Editar</a></td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
//               categorias: [],
            };
        },
        props: ['colunas', 'data', 'tipo'],
        mounted() {
            $('#table').bootstrapTable({
                cache: false,
                height: 500,
                striped: true,
                searchTimeOut: 10
            });
        },
        methods: {
            apaga: function () {
                alert(message)
            },

            say: function (message) {
                alert(message)
            }

        }
    };
</script>
<style>

</style>
