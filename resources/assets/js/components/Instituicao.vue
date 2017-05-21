<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>


            <div class="form-group" :class="{ 'has-error': form.errors.has('CNPJ') }">
                <label for="CNPJ" class="col-md-3 control-label">CNPJ: </label>
                <div class="col-md-6">
                    <the-mask v-model="form.CNPJ" type="CNPJ" name="CNPJ" id="CNPJ"
                              class="form-control" :mask="'##.###.###/####-##'"/>
                    <has-error :form="form" field="CNPJ"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('razaoSocial') }">
                <label for="razaoSocial" class="col-md-3 control-label">Razão Social: </label>
                <div class="col-md-6">
                    <input v-model="form.razaoSocial" type="razaoSocial" name="razaoSocial" id="razaoSocial"
                           class="form-control">
                    <has-error :form="form" field="razaoSocial"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('naturezaJuridica') }">
                <label for="naturezaJuridica" class="col-md-3 control-label">Natureza Juridica: </label>
                <div class="col-md-6">
                    <input v-model="form.naturezaJuridica" type="naturezaJuridica" name="naturezaJuridica"
                           id="naturezaJuridica"
                           class="form-control">
                    <has-error :form="form" field="naturezaJuridica"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('nomeDaArea') }">
                <label for="nomeDaArea" class="col-md-3 control-label">Nome da Area: </label>
                <div class="col-md-6">
                    <input v-model="form.nomeDaArea" type="nomeDaArea" name="nomeDaArea" id="nomeDaArea"
                           class="form-control">
                    <has-error :form="form" field="nomeDaArea"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('ddd') }">
                <label for="ddd" class="col-md-3 control-label">DDD: </label>
                <div class="col-md-6">
                    <input v-model="form.ddd" type="ddd" name="ddd" id="ddd"
                           class="form-control">
                    <has-error :form="form" field="ddd"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('telefone') }">
                <label for="telefone" class="col-md-3 control-label">Telefone: </label>
                <div class="col-md-6">
                    <the-mask masked="true" v-model="form.telefone" type="telefone" name="telefone" id="telefone"
                              class="form-control" :mask="['(##)####-####', '(##)####-####']"/>
                    <has-error :form="form" field="telefone"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                <label for="email" class="col-md-3 control-label">Email: </label>
                <div class="col-md-6">
                    <the-mask v-model="form.email" type="email" name="email" id="email"
                              class="form-control"/>
                    <has-error :form="form" field="email"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('UF') }">
                <label for="UF" class="col-md-3 control-label">UF: </label>
                <div class="col-md-6">
                    <uf v-on:update="val => form.UF = val"></uf>
                    <has-error :form="form" field="UF"></has-error>
                </div>
            </div>


            <!--<div class="form-group" :class="{ 'has-error': form.errors.has('UF') }">-->
            <!--<label for="UF" class="col-md-3 control-label">UF: </label>-->
            <!--<div class="col-md-6">-->
            <!--<input v-model="form.UF" type="UF" name="UF" id="UF"-->
            <!--class="form-control">-->
            <!--<has-error :form="form" field="UF"></has-error>-->
            <!--</div>-->
            <!--</div>-->

            <div class="form-group" :class="{ 'has-error': form.errors.has('cidade') }">
                <label for="cidade" class="col-md-3 control-label">Cidade: </label>
                <div class="col-md-6">
                    <input v-model="form.cidade" type="cidade" name="cidade" id="cidade"
                           class="form-control">
                    <has-error :form="form" field="cidade"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('endereco') }">
                <label for="endereco" class="col-md-3 control-label">Endereço: </label>
                <div class="col-md-6">
                    <input v-model="form.endereco" type="endereco" name="endereco" id="endereco"
                           class="form-control">
                    <has-error :form="form" field="endereco"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('bairro') }">
                <label for="bairro" class="col-md-3 control-label">Bairro: </label>
                <div class="col-md-6">
                    <input v-model="form.bairro" type="bairro" name="bairro" id="bairro"
                           class="form-control">
                    <has-error :form="form" field="bairro"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('CEP') }">
                <label for="CEP" class="col-md-3 control-label">CEP: </label>
                <div class="col-md-6">
                    <input v-model="form.CEP" type="CEP" name="CEP" id="CEP"
                           class="form-control">
                    <has-error :form="form" field="CEP"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('site') }">
                <label for="site" class="col-md-3 control-label">site: </label>
                <div class="col-md-6">
                    <input v-model="form.site" type="site" name="site" id="site"
                           class="form-control">
                    <has-error :form="form" field="site"></has-error>
                </div>
            </div>

            <div>
                <cargo-select>Aqui vai a selecção do cargo</cargo-select>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('sexo') }">
                <label for="sexo" class="col-md-3 control-label">sexo: </label>
                <div class="col-md-6">
                    <input v-model="form.sexo" type="sexo" name="sexo" id="sexo"
                           class="form-control">
                    <has-error :form="form" field="sexo"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('CPF') }">
                <label for="CPF" class="col-md-3 control-label">CPF: </label>
                <div class="col-md-6">
                    <the-mask v-model="form.CPF" type="CPF" name="CPF" id="CPF"
                              class="form-control"
                              :mask="'###.###.###-##'"/>
                    <has-error :form="form" field="CPF"></has-error>
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
    import Uf from '../components/uf.vue'

    export default {
        components: {Uf},
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    CNPJ: '',
                    razaoSocial: '',
                    naturezaJuridica: '',
                    nomeDaArea: '',
                    ddd: '',
                    telefone: '',
                    email: '',
                    UF: '',
                    cidade: '',
                    endereco: '',
                    bairro: '',
                    CEP: '',
                    site: '',
                    nomeCompleto: '',
                    sexo: '',
                    CPF: '',
                })
            }
        },
        props: ['id', 'descricao'],
        mounted() {
            console.log('Component mounted.');
            this.form.descricao = this.descricao;
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/instituicoes/update/' + this.id)
                        .then(({data}) => {
                            window.location.href = '/instituicoes'
                        })
                } else {
                    this.form.post('/instituicoes/create')
                        .then(({data}) => {
                            window.location.href = '/instituicoes'
                        })
                }

            },
            update(){
                console.log('teste');
            },
        }

    };
</script>
