<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>

            <div class="form-group" :class="{ 'has-error': form.errors.has('edicao') }">
                <label for="edicao" class="col-md-3 control-label">Edição: </label>
                <div class="col-md-6">
                    <input v-model="form.edicao" type="number" name="edicao" id="edicao"
                           class="form-control">
                    <has-error :form="form" field="edicao"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('data_abertura') }">
                <label for="data_abertura" class="col-md-3 control-label">Data de Abertura: </label>
                <div class="col-md-6">
                    <input v-model="form.data_abertura" type="date" name="data_abertura" id="data_abertura"
                           class="form-control">
                    <has-error :form="form" field="data_abertura"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('data_encerramento') }">
                <label for="data_encerramento" class="col-md-3 control-label">Data de Encerramento: </label>
                <div class="col-md-6">
                    <input v-model="form.data_encerramento" type="date" name="data_encerramento" id="data_encerramento"
                           class="form-control">
                    <has-error :form="form" field="data_encerramento"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('encerrado') }">
                <label for="encerrado" class="col-md-3 control-label">Encerrado?: </label>
                <div class="col-md-6">
                    <!--<input v-model="form.encerrado" type="checkbox" name="encerrado" id="encerrado"-->
                           <!--class="form-control">-->
                    <input v-model="form.encerrado" type="checkbox" name="encerrado" id="encerrado" >
                    <has-error :form="form" field="encerrado"></has-error>
                </div>
            </div>

            <div class="form-group">
                <button :disabled="form.busy" type="submit" class="btn btn-primary" name="enviar">Enviar</button>
            </div>
        </form>
    </div>
</template>

<script>
    import {Form, HasError, AlertError} from 'vform'
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    id: this.premio.id,
                    edicao: this.premio.edicao,
                    data_abertura: this.premio.data_abertura,
                    data_encerramento: this.premio.data_abertura,
                    encerrado: this.premio.encerrado,
//                    remember: false
                })
            }
        },
        props: ['premio'],
        mounted() {
            console.log('Component mounted.');
            this.form.nome = this.nome;
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                let location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    console.log(this.form.id);
                    this.form.put('/admin/premios/update/'+ this.form.id)
                        .then(({data}) => {
                            window.location.href = '/admin/premios'
                        })
                } else {
                    this.form.post('/admin/premios/create')
                        .then(({data}) => {
                            window.location.href = '/admin/premios'
                        })
                }

            },
        }

    };
</script>
