<template>
    <div class="container">
        <div>
            <a :href="'/'+tipo+'/insert/'" class="btn btn-primary">NOVO</a>
        </div>
        <table data-toggle="table"
               data-search="true"
               data-search-accent-neutralise="true"
               data-pagination="true"
               data-locale="pt-BR">
            <thead>
            <tr>
                <th v-for="(val, key) in colunas"
                    :data-field='key'
                    data-sortable="true">
                    {{val}}
                </th>
                <th data-sortable="false"></th>
                <th data-sortable="false"></th>
            </tr>
            <!--<tr>-->
            <!--<th data-field="id" data-sortable="true">Item ID</th>-->
            <!--<th data-field="descricao" data-sortable="true">descricao</th>-->
            <!--<th data-sortable="false"></th>-->
            <!--<th data-sortable="false"></th>-->
            <!--</tr>-->

            </thead>

            <tbody>
            <tr v-for="linha in data">
                <td v-for="(val, key, index) in linha">
                    {{linha[key]}}
                </td>
                <td><a class="btn btn-danger" :href="'/'+tipo+'/delete/' + linha.id">Excluir</a></td>
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

        },
    };
</script>
<style>

</style>
