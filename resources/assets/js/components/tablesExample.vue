<template>
    <div class="container">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th v-for="(val, key) in categorias[0]">
                    {{key}}
                </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th v-for="(val, key) in categorias[0]">
                    {{key}}
                </th>
            </tr>
            </tfoot>
            <tbody>
            <tr v-for="linha in categorias">
                <td v-for="(val, key) in linha">
                    {{linha[key]}}
                </td>
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
            }
        },
        props: ['categorias'],
        mounted() {
            $(document).ready(function () {
                $('#example').DataTable();

//                let table = $('#example').DataTable();
//                $('input:contains("search")').prevObject["0"].activeElement.id = 'myInput';
//                // Remove accented character from search input as well
//                $('#myInput').keyup(function () {
//                    table
//                        .search(
//                            jQuery.fn.DataTable.ext.type.search.string(this.value)
//                        )
//                        .draw()
//                });
            });
//            $(document).ready(function () {
//                let table = $('#example').dataTable();
//                // Remove accented character from search input as well
//                $('#myInput').keyup(function () {
//                    table
//                        .search(
//                            jQuery.fn.DataTable.ext.type.search.string(this.value)
//                        )
//                        .draw()
//                });
//            });

        },
    };
</script>
<style>

</style>
