<template>
    <div class="container">
                <div class="form-group">
                    <label for="nome" class="col-md-3 control-label">nome</label>
                    <div class="col-md-6">
                        <input v-model="responsavel.nome" type="nome" name="nome" id="nome"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-md-3 control-label">telefone</label>
                    <div class="col-md-6">
                        <input v-model="responsavel.telefone" type="telefone" name="telefone" id="telefone"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">email</label>
                    <div class="col-md-6">
                        <input v-model="responsavel.email" type="email" name="email" id="email"
                               class="form-control">
                    </div>
                </div>
        <br>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                responsavel: {
                    nome: '',
                    telefone: 0,
                    email: '',
                }
            }
        },
//        props: {
//            responsavel: {
//                nome: String,
//                telefone: Number,
//                email: String
//            }
//        },
        mounted() {
            console.log('Component mounted.');
        },
        methods: {
        }

    };
</script>
