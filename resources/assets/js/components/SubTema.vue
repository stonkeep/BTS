<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>

            <div class="form-group" :class="{ 'has-error': form.errors.has('descricao') }">
                <label for="descricao" class="col-md-3 control-label">descricao</label>
                <div class="col-md-6">
                    <input v-model="form.descricao" type="descricao" name="descricao" id="descricao"
                           class="form-control">
                    <has-error :form="form" field="descricao"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('descricao') }">
                <label for="descricao" class="col-md-3 control-label">Tema: </label>
                <div class="col-md-6">
                    <select class="form-control" v-model="selected">
                        <option v-for="tema in temas" v-bind:value="tema.id">
                            {{ tema.nome }}
                        </option>
                    </select>

                    <has-error :form="form" field="tema_id"></has-error>
                </div>
            </div>
            {{selected}}

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
                selected: '',
                // Create a new form instance
                form: new Form({
                    descricao: '',
                    tema_id: '',
//                    remember: false
                })
            }
        },
        props: ['id', 'descricao', 'temas'],
        mounted() {
            console.log('Component mounted.');
            this.form.descricao = this.descricao;
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                this.form.tema_id = this.selected;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/subtemas/update/'+ this.id)
                        .then(({data}) => {
                            window.location.href = '/subtemas'
                        })
                } else {
                    this.form.post('/subtemas/create')
                        .then(({data}) => {
                            window.location.href = '/subtemas'
                        })
                }

            },
        }

    };
</script>
