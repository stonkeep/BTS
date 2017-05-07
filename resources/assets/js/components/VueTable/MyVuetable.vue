<template>
    <div>
        <form id="search">
            Search <input name="query" v-model="filterKey">
        </form>
        <table>
            <thead>
            <tr>
                <th v-for="(val, key) in columns[0]"
                    @click="sortBy(key)"
                    :class="{ active: sortKey == key }">
                    {{key | capitalize }}
                    <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="linha in filteredData">
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
//            this.categorias.forEach(function (key) {
//                this.sortOrders[key] = 1
//            });
            return {
                sortKey: '',
//                sortOrders: {},
                columns: this.categorias,
                filterKey: '',
                sortOrders: {id: 1, descricao: 1, created_at: 1, updated_at: 1},
            }
        },
        props: ['categorias'],
        mounted() {
//            console.log(Object.keys(this.columns[0]));
//            let i=0;
//            Object.keys(this.columns[0]).forEach(function (key) {
//                this.sortOrders.push = {key: 1};
//                i++;
//            });
        },
        methods: {
            sortBy: function (key) {
                this.sortKey = key;
                sortOrders.forEach((key) =>
                    this.sortOrders[key] = 1
                );
                this.sortOrders[key] = this.sortOrders[key] * -1;
            }
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        computed: {
            filteredData: function () {
                let sortKey = this.sortKey;
                let filterKey = this.filterKey && this.filterKey.toLowerCase();
                let order = this.sortOrders[sortKey] || 1;
                let data = this.columns;
                if (filterKey) {
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (sortKey) {
                    data = data.slice().sort(function (a, b) {
                        a = a[sortKey];
                        b = b[sortKey];
                        return (a === b ? 0 : a > b ? 1 : -1) * order
                    })
                }
                return data
            }
        },

    };
</script>
<style>
    body {
        font-family: Helvetica Neue, Arial, sans-serif;
        font-size: 14px;
        color: #444;
    }

    table {
        border: 2px solid #42b983;
        border-radius: 3px;
        background-color: #fff;
    }

    th {
        background-color: #42b983;
        color: rgba(255, 255, 255, 0.66);
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    td {
        background-color: #f9f9f9;
    }

    th, td {
        min-width: 120px;
        padding: 10px 20px;
    }

    th.active {
        color: #fff;
    }

    th.active .arrow {
        opacity: 1;
    }

    .arrow {
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 0;
        margin-left: 5px;
        opacity: 0.66;
    }

    .arrow.asc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-bottom: 4px solid #fff;
    }

    .arrow.dsc {
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #fff;
    }
</style>