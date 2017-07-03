<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>


            <div class="form-group" :class="{ 'has-error': form.errors.has('CNPJ') }">
                <label for="CNPJ" class="col-md-3 control-label">CNPJ: </label>
                <div class="col-md-6">
                    <the-mask v-model="form.CNPJ" type="CNPJ" name="CNPJ" id="CNPJ"
                              class="form-control" :mask="'##.###.###/####-##'" :masked="false"/>
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
                    <multiselect name="naturezaJuridica" v-model="form.naturezaJuridica"
                                 :options="naturezajuridicaoptions"
                                 :multiple="false" :close-on-select="true" :clear-on-select="false"
                                 :hide-selected="false" placeholder="Escolha um"
                                 label="descricao" track-by="descricao"></multiselect>
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
                              class="form-control" :mask="['####-####', '#####-####']" :masked="false"/>
                    <has-error :form="form" field="telefone"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                <label for="email" class="col-md-3 control-label">Email: </label>
                <div class="col-md-6">
                    <input v-model="form.email" type="email" name="email" id="email"
                           class="form-control"/>
                    <has-error :form="form" field="email"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('CEP') }">
                <label for="CEP" class="col-md-3 control-label">CEP: </label>
                <div class="col-md-6">
                    <input class="form-control" maxlength="8" type="text" v-model="form.CEP"

                           id="CEP"/>
                    <!--@keyup="onKeyup" @keydown="onKeydown($event)"-->
                    <!--<input v-model="form.CEP" type="CEP" name="CEP" id="CEP"-->
                    <!--class="form-control">-->
                    <!--TODO Fazer um buscador de CEP-->
                    <has-error :form="form" field="CEP"></has-error>
                </div>
            </div>


            <div class="form-group">
                <label for="UF" class="col-md-3 control-label">UF: </label>
                <div class="col-md-6">
                    <uf :uf="form.UF" v-on:update="val => form.UF = val"></uf>
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


            <div class="form-group" :class="{ 'has-error': form.errors.has('site') }">
                <label for="site" class="col-md-3 control-label">site: </label>
                <div class="col-md-6">
                    <input v-model="form.site" type="site" name="site" id="site"
                           class="form-control" placeholder="http://www.fbb.org.br">
                    <has-error :form="form" field="site"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('nomeCompleto') }">
                <label for="nomeCompleto" class="col-md-3 control-label">Nome Completo: </label>
                <div class="col-md-6">
                    <input v-model="form.nomeCompleto" type="nomeCompleto" name="nomeCompleto" id="nomeCompleto"
                           class="form-control">
                    <has-error :form="form" field="nomeCompleto"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('cargo_id') }">
                <label for="cargo_id" class="col-md-3 control-label">Cargo: </label>
                <div class="col-md-6">
                    <multiselect name="cargo_id" v-model="form.cargo_id" :options="cargooptions"
                                 :multiple="false" :close-on-select="true" :clear-on-select="false"
                                 :hide-selected="false" placeholder="Escolha um"
                                 label="descricao" track-by="descricao"></multiselect>
                    <has-error :form="form" field="cargo_id"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('sexo') }">
                <label for="sexo" class="col-md-3 control-label">sexo: </label>
                <div class="col-md-6">
                    <select v-model="form.sexo" name="sexo" id="sexo">
                        <option value="">Selecione</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
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
    import Multiselect from 'vue-multiselect'

    export default {
        components: {Uf, Multiselect},
        data () {
            return {
                // Create a new form instance
                CEP: '',
                rua: '',
                bairro: '',
                cidade: '',
                estado: '',
                numero: '',
                complemento: '',


                form: new Form({
                    CNPJ: this.instituicao.CNPJ,
                    razaoSocial: this.instituicao.razaoSocial,
                    naturezaJuridica: this.naturezajuridicaoptions[this.instituicao.naturezaJuridica - 1],
                    nomeDaArea: this.instituicao.nomeDaArea,
                    ddd: this.instituicao.ddd,
                    telefone: (this.instituicao.telefone == undefined) ? '' :
                        this.instituicao.telefone.toString(),
                    email: this.instituicao.email,
                    UF: this.instituicao.UF,
                    cidade: this.instituicao.cidade,
                    endereco: this.instituicao.endereco,
                    bairro: this.instituicao.bairro,
                    CEP: this.instituicao.CEP,
                    site: this.instituicao.site,
                    nomeCompleto: this.instituicao.nomeCompleto,
                    sexo: this.instituicao.sexo,
                    CPF: this.instituicao.CPF,
                    cargo_id: this.cargooptions[this.instituicao.cargo_id - 1],
                })
            }
        },
        props: ['instituicao', 'naturezajuridicaoptions', 'cargooptions'],
        mounted() {
            this.form.id = this.instituicao.id;
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                let location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/admin/instituicoes/' + this.form.id)
                        .then(({data}) => {
                            window.location.href = '/admin/instituicoes'
                        })
                } else {
                    this.form.post('/admin/instituicoes')
                        .then(({data}) => {
                            window.location.href = '/admin/instituicoes'
                        })
                }

            },
            update(){
                console.log('teste');
            },
            viacepURL: function(cep) {
                return 'https://viacep.com.br/ws/'+cep+'/json/';
            },
        },
        watch: {
          'form.CEP' : function (val, oldVal) {
              if ( !(/^[0-9]{8}$/).test(this.form.CEP)) return;
              this.rua = '';
              window.axios.defaults.headers.common = {
                  'X-Requested-With': 'XMLHttpRequest',
              };
              axios.get('https://viacep.com.br/ws/'+ this.form.CEP +'/json/')
                  .then(response => {
                      console.log(response.data.logradouro);
                      this.form.endereco = response.data.logradouro;
                      this.form.bairro = response.data.bairro;
                      this.form.UF = response.data.uf;
                      this.form.cidade = response.data.localidade;
                      }
                  )
                  .catch(error => console.log(error));
          }
        },
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
