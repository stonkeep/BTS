<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>

            <div class="form-group" :class="{ 'has-error': form.errors.has('nome') }">
                <label for="nome" class="col-md-3 control-label">nome</label>
                <div class="col-md-6">
                    <input v-model="form.nome" type="nome" name="nome" id="nome"
                           class="form-control">
                    <has-error :form="form" field="nome"></has-error>
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
                    nome: '',
//                    remember: false
                })
            }
        },
        props: ['id', 'nome'],
        mounted() {
            console.log('Component mounted.');
            this.form.nome = this.nome;
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/temas/update/'+ this.id)
                        .then(({data}) => {
                            window.location.href = '/temas'
                        })
                } else {
                    this.form.post('/temas/create')
                        .then(({data}) => {
                            window.location.href = '/temas'
                        })
                }

            },
        }

    };
</script>
