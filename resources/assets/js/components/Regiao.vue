<template>
    <div class="container">
        <form @submit.prevent="login" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>

            <div class="form-group" :class="{ 'has-error': form.errors.has('sigla') }">
                <label for="sigla" class="col-md-3 control-label">sigla</label>
                <div class="col-md-6">
                    <input v-model="form.sigla" type="text" name="sigla" id="sigla" class="form-control">
                    <has-error :form="form" field="sigla"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('descricao') }">
                <label for="descricao" class="col-md-3 control-label">descricao</label>
                <div class="col-md-6">
                    <input v-model="form.descricao" type="descricao" name="descricao" id="descricao" class="form-control">
                    <has-error :form="form" field="descricao"></has-error>
                </div>
            </div>

            <div class="form-group">
                <button :disabled="form.busy" type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</template>

<script>
    import { Form, HasError, AlertError } from 'vform'
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    sigla: '',
                    descricao: '',
//                    remember: false
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            login () {
                // Submit the form via a POST request
                this.form.post('/regioes/create')
//                    .then(({ data }) => { console.log(data) })
                    .then(({ data }) => { window.location.href = '/regioes' })
            }
        }

    };
</script>
