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

            <div class="form-group" :class="{ 'has-error': form.errors.has('tema_id') }">
                <label for="tema_id" class="col-md-3 control-label">Tema: </label>
                <div class="col-md-6">
                    <select class="form-control" v-model="form.tema_id" name="tema_id">
                        <option v-for="tema in temas" v-bind:value="tema.id">
                            {{ tema.nome }}
                        </option>
                    </select>

                    <has-error :form="form" field="tema_id"></has-error>
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
                selected: '',
                // Create a new form instance
                form: new Form({
                    descricao: this.subtema.descricao,
                    tema_id: this.subtema.tema_id,
//                    remember: false
                })
            }
        },
        props: ['subtema', 'temas'],
        mounted() {
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/admin/subtemas/update/'+ this.id)
                        .then(({data}) => {
                            window.location.href = '/admin/subtemas'
                        })
                } else {
                    this.form.post('/admin/subtemas/create')
                        .then(({data}) => {
                            window.location.href = '/admin/subtemas'
                        })
                }

            },
        }

    };
</script>
