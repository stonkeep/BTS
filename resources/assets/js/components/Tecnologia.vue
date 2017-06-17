<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>
            <alert-errors :form="form" message="There were some problems with your input."></alert-errors>

            <!----------------------Título----------------------------------------------------------------------------------------->
            <div class="form-group" :class="{ 'has-error': form.errors.has('titulo') }">
                <label for="titulo" class="col-md-3 control-label">Título</label>
                <div class="col-md-6">

                    <input v-model="form.titulo" type="text" name="titulo" id="titulo"
                           class="form-control">
                    <has-error :form="form" field="titulo"></has-error>
                </div>
            </div>

            <!----------------------Fim lucrativo---------------------------------------------------------------------------------->

            <div class="form-group" :class="{ 'has-error': form.errors.has('fimLucrativo') }">
                <label for="fimLucrativo" class="col-md-3 control-label">Fím Lucrativo</label>
                <div class="col-md-6" id="fimLucrativo">
                    <input type="radio" name="fimLucrativo" id="fimLucrativoSim" value="0" v-model="form.fimLucrativo">
                    <label for="fimLucrativoSim">Sim</label>
                    <br>
                    <input type="radio" name="fimLucrativo" id="fimLucrativoNao" value="1" v-model="form.fimLucrativo">
                    <label for="fimLucrativoNao">Não</label>
                    <has-error :form="form" field="fimLucrativo"></has-error>
                </div>
            </div>

            <!----------------------Tempo de Implantação--------------------------------------------------------------------------->
            <div class="form-group" :class="{ 'has-error': form.errors.has('tempoImplantacao') }">
                <label for="tempoImplantacao" class="col-md-3 control-label">Tempo de implantação</label>
                <div class="col-md-6">
                    <input type="number" name="tempoImplantacao" id="tempoImplantacao"
                           v-model="form.tempoImplantacao">
                    <has-error :form="form" field="tempoImplantacao"></has-error>
                </div>
            </div>

            <!----------------------Em atividade?--------------------------------------------------------------------------->
            <div class="form-group" :class="{ 'has-error': form.errors.has('emAtividade') }">
                <label for="emAtividade" class="col-md-3 control-label">Em Atividade:</label>
                <div class="col-md-6" id="emAtividade">
                    <input type="radio" name="emAtividade" id="emAtividadeSim" value="1" v-model="form.emAtividade">
                    <label for="emAtividadeSim">Sim</label>
                    <br>
                    <input type="radio" name="emAtividade" id="emAtividadeNao" value="0" v-model="form.emAtividade">
                    <label for="emAtividadeNao">Não</label>
                    <has-error :form="form" field="emAtividade"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('inscricaoAnterior') }">
                <label for="inscricaoAnterior" class="col-md-3 control-label">Iscrições Anteriores:</label>
                <div class="col-md-6" id="inscricaoAnterior">
                    <input type="radio" name="inscricaoAnterior" id="inscricaoAnteriorSim" value="1"
                           v-model="form.inscricaoAnterior">
                    <label for="inscricaoAnteriorSim">Sim</label>
                    <br>
                    <input type="radio" name="inscricaoAnterior" id="inscricaoAnteriorNao" value="0"
                           v-model="form.inscricaoAnterior">
                    <label for="inscricaoAnteriorNao">Não</label>
                    <has-error :form="form" field="inscricaoAnterior"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('investimentoFBB') }">
                <label for="investimentoFBB" class="col-md-3 control-label">Ja contou com investimento da FBB?:</label>
                <div class="col-md-6" id="investimentoFBB">
                    <input type="radio" name="investimentoFBB" id="investimentoFBBSim" value="1"
                           v-model="form.investimentoFBB">
                    <label for="investimentoFBBSim">Sim</label>
                    <br>
                    <input type="radio" name="investimentoFBB" id="investimentoFBBNao" value="0"
                           v-model="form.investimentoFBB">
                    <label for="investimentoFBBNao">Não</label>
                    <has-error :form="form" field="investimentoFBB"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('categoria_id') }">
                <label for="categoria_id" class="col-md-3 control-label">Categoria: </label>
                <div class="col-md-6" id="categoria_id">
                    <select class="form-control" v-model="form.categoria_id" name="categoria_id">
                        <option v-for="categoria in categorias" v-bind:value="categoria.id">
                            {{ categoria.descricao }}
                        </option>
                    </select>

                    <has-error :form="form" field="categoria_id"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('resumo') }">
                <label for="resumo" class="col-md-3 control-label">Resumo: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.resumo" name="resumo" id="resumo"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="resumo"></has-error>
                </div>
            </div>


            <!--Tema principal-->
            <div class="form-group" :class="{ 'has-error': form.errors.has('tema_id') }">
                <label for="tema_id" class="col-md-3 control-label">Tema: </label>
                <div class="col-md-6" id="tema_id">
                    <select class="form-control" v-model="form.tema_id" name="tema_id">
                        <option v-for="(tema, index) in temas1" v-bind:value="tema.id" :nome="tema.nome">
                            {{ tema.nome }}
                        </option>
                    </select>
                    <has-error :form="form" field="tema_id"></has-error>
                </div>
            </div>

            <!--Sub tema 1-->
            <div class="form-group" :class="{ 'has-error': form.errors.has('subtema1') }">
                <label for="subtema1" class="col-md-3 control-label">Sub-Temas:</label>
                <div class="col-md-6" id="subtema1">
                    <select class="form-control" v-model="form.subtema1" name="subtema1" multiple>
                        <option v-for="subtema1 in subtemas1" v-bind:value="subtema1.id">
                            {{ subtema1.descricao }}
                        </option>
                    </select>
                    <has-error :form="form" field="subtema1"></has-error>
                    <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>

                </div>
            </div>

            <!--Tema secundário-->
            <div class="form-group" :class="{ 'has-error': form.errors.has('temaSecundario_id') }">
                <label for="temaSecundario_id" class="col-md-3 control-label">Tema Secundário: </label>
                <div class="col-md-6" id="temaSecundario_id">
                    <select class="form-control" v-model="form.temaSecundario_id" name="temaSecundario_id">
                        <option v-for="tema in temas2" v-bind:value="tema.id" :nome="tema.nome">
                            {{ tema.nome }}
                        </option>
                    </select>
                    <has-error :form="form" field="temaSecundario_id"></has-error>
                </div>
            </div>

            <!--Sub Tema 2-->
            <div class="form-group" :class="{ 'has-error': form.errors.has('subtema2') }">
                <label for="subtema2" class="col-md-3 control-label">Sub-Temas:</label>
                <div class="col-md-6" id="subtema2">
                    <select class="form-control" v-model="form.subtema2" name="subtema2" multiple>
                        <option v-for="subtema2 in subtemas2" v-bind:value="subtema2.id">
                            {{ subtema2.descricao }}
                        </option>
                    </select>
                    <has-error :form="form" field="subtema2"></has-error>
                    <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>

                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('problema') }">
                <label for="problema" class="col-md-3 control-label">Problema: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.problema" name="problema" id="problema"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="problema"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('objetivoGeral') }">
                <label for="objetivoGeral" class="col-md-3 control-label">Objetivo Geral: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.objetivoGeral" name="objetivoGeral" id="objetivoGeral"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="objetivoGeral"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('objetivoEspecifico') }">
                <label for="objetivoEspecifico" class="col-md-3 control-label">Objetivo Especifico: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.objetivoEspecifico" name="objetivoEspecifico"
                              id="objetivoEspecifico"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="objetivoEspecifico"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('descricao') }">
                <label for="descricao" class="col-md-3 control-label">Descricao: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.descricao" name="descricao" id="descricao"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="descricao"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('resultadosAlcancados') }">
                <label for="resultadosAlcancados" class="col-md-3 control-label">Resultados Alcancados: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.resultadosAlcancados" name="resultadosAlcancados"
                              id="resultadosAlcancados"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="resultadosAlcancados"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('recursosHumanos') }">
                <label for="recursosHumanos" class="col-md-3 control-label">Recursos Humanos: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.recursosHumanos" name="recursosMateriais"
                              id="recursosHumanos"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="recursosMateriais"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('recursosMateriais') }">
                <label for="recursosMateriais" class="col-md-3 control-label">Recursos Materiais: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.recursosMateriais" name="recursosMateriais"
                              id="recursosMateriais"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="recursosMateriais"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('valorEstimado') }">
                <label for="valorEstimado" class="col-md-3 control-label">Valor Estimado: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.valorEstimado" name="valorEstimado"
                              id="valorEstimado"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="valorEstimado"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('valorHumanos') }">
                <label for="valorHumanos" class="col-md-3 control-label">Valor Humanos: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.valorHumanos" name="valorHumanos"
                              id="valorHumanos"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="valorHumanos"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('depoimentoLivre') }">
                <label for="depoimentoLivre" class="col-md-3 control-label">depoimento Livre: </label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" v-model="form.depoimentoLivre" name="depoimentoLivre"
                              id="depoimentoLivre"
                              class="form-control">
                    </textarea>
                    <has-error :form="form" field="depoimentoLivre"></has-error>
                </div>
            </div>

            <!----------------------Responsáveis---------------------------------------------------------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Responsáveis</h3>
                </div>
                <div class="panel-body">
                    <!--<responsavel v-for="resp in qtdResponsaveis"></responsavel>-->

                    <div v-for="(responsavel, index) in form.responsaveis">

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Nome: </label>
                            <div class="col-md-6">
                                <input v-model="responsavel.nome" type="nome" name="nome" id="nome"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefone" class="col-md-3 control-label">Telefone: </label>
                            <div class="col-md-6">
                                <input v-model="responsavel.telefone" type="telefone" name="telefone" id="telefone"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email: </label>
                            <div class="col-md-6">
                                <input v-model="responsavel.email" type="email" name="email" id="email"
                                       class="form-control">
                            </div>
                        </div>
                        <button v-on:click.prevent="form.responsaveis.splice(index, 1)"
                                class="btn btn-danger glyphicon glyphicon-minus"></button>
                    </div>
                </div>
            </div>
            <has-error :form="form" field="responsaveis"></has-error>

            <div class="form-inline">
                <button v-on:click.prevent="adicionaResponsavel"
                        class="btn btn-success glyphicon glyphicon-plus"></button>
            </div>


            <!--//TODO Locais e datas onde a Tecnologia Social já foi implementada:-->
            <!----------------------Locais e datas---------------------------------------------------------------------------------->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"
                        :class="{ 'has-error': form.errors.has('locaisDatas') }">
                        Locais e datas onde a Tecnologia Social já foi implementada:</h3>
                </div>
                <div class="panel-body">
                    <div v-for="(localData, index) in form.locaisDatas">

                        <div class="form-group">
                            <label for="ativo"
                                   class="col-md-3 control-label">Ja contou com investimento da FBB?:</label>
                            <div class="col-md-6" id="ativo">
                                <input type="radio" name="ativo" id="ativoSim" value="1"
                                       v-model="localData.ativo">
                                <label for="ativoSim">Sim</label>
                                <br>
                                <input type="radio" name="ativo" id="ativoNao" value="0"
                                       v-model="localData.ativo">
                                <label for="ativoNao">Não</label>
                                <has-error :form="form" field="ativo"></has-error>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="UF" class="col-md-3 control-label">UF: </label>
                            <div class="col-md-6">
                                <uf v-on:update="val => localData.uf = val"></uf>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telefone" class="col-md-3 control-label">Cidade: </label>
                            <div class="col-md-6">
                                <input v-model="localData.cidade" type="telefone" name="telefone" id="cidade"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Bairro: </label>
                            <div class="col-md-6">
                                <input v-model="localData.bairro" type="bairro" name="email" id="bairro"
                                       class="form-control">
                            </div>
                        </div>
                        <button v-on:click.prevent="form.locaisDatas.splice(index, 1)"
                                class="btn btn-danger glyphicon glyphicon-minus"></button>
                    </div>
                </div>
            </div>
            <div class="form-inline">
                <button v-on:click.prevent="adicionaLocaisDatas"
                        class="btn btn-success glyphicon glyphicon-plus"></button>

            </div>
            <!--//TODO Público e quantidade total de pessoas atendidos por uma unidade da tecnologia social:-->
<!--------------------Publico Alvo atendido-------------------------------------------------------------------------->
            <div class="form-group" :class="{ 'has-error': form.errors.has('PublicosAlvo') }">
                <label for="PublicosAlvo" class="col-md-3 control-label">Publicos Alvo:</label>
                <div class="col-md-6" id="PublicosAlvo">
                    <select class="form-control" v-model="form.PublicosAlvo" name="PublicosAlvo" multiple>
                        <option v-for="publico in PublicosAlvo" v-bind:value="publico.id">
                            {{ publico.descricao }}
                        </option>
                    </select>
                    <has-error :form="form" field="PublicosAlvo"></has-error>
                    <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>

                </div>
            </div>
            <!--//TODO Recursos humanos necessários para implantação de uma unidade da tecnologia social:-->
            <!--//TODO Instituições parceiras na tecnologia:-->
            <!--//TODO Anexos da tecnologia:-->
            <!--//TODO Endereços eletrônicos associados à tecnologia:-->
            <!--//TODO Banco de Imagens:-->
            <!--//TODO -->
            <br>
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
                raiz: location.host,
                subtemas1: [],
                subtemas2: [],
                temas1: [],
                temas2: [],
                PublicosAlvo: [],

                // Create a new form instance
                form: new Form({
                    id: this.tecnologia.id,
                    numeroInscricao: this.tecnologia.numeroInscricao,
                    titulo: this.tecnologia.titulo,
                    fimLucrativo: this.tecnologia.fimLucrativo,
                    tempoImplantacao: this.tecnologia.tempoImplantacao,
                    emAtividade: this.tecnologia.emAtividade,
                    inscricaoAnterior: this.tecnologia.inscricaoAnterior,
                    investimentoFBB: this.tecnologia.investimentoFBB,
                    categoria_id: this.tecnologia.categoria_id,
                    resumo: this.tecnologia.resumo,
                    tema_id: this.tecnologia.tema_id,
                    subtema1: [],
                    temaSecundario_id: this.tecnologia.temaSecundario_id,
                    subtema2: [],
                    problema: this.tecnologia.problema,
                    objetivoGeral: this.tecnologia.objetivoGeral,
                    objetivoEspecifico: this.tecnologia.objetivoEspecifico,
                    descricao: this.tecnologia.descricao,
                    resultadosAlcancados: this.tecnologia.resultadosAlcancados,
                    recursosMateriais: this.tecnologia.recursosMateriais,
                    recursosHumanos: this.tecnologia.recursosHumanos,
                    valorEstimado: this.tecnologia.valorEstimado,
                    valorHumanos: this.tecnologia.valorHumanos,
                    depoimentoLivre: this.tecnologia.depoimentoLivre,
                    responsaveis: [
                        {
                            nome: '',
                            telefone: '',
                            email: ''
                        },
                    ],
                    locaisDatas: [
                        {
                            ativo: true,
                            uf: '',
                            cidade: '',
                            bairro: '',
                            dataImplantacao: ''
                        },
                    ],
                    PublicosAlvo: [],
//                    instituicao_id: this.tecnologia.instituicaos_id,
//                    TODO Nao esquecer de tirar depois
                    instituicao_id: 1,
                })
            };
        },
        props: ['tecnologia', 'categorias', 'temas', 'propssubtemas1', 'publicos'],
        mounted() {
            this.temas1 = this.temas;
            this.temas2 = this.temas;
            this.PublicosAlvo = this.publicos;

//            axios.get('../../api/subtemas/' + this.form.tema_id)
//                .then(response => this.subtemas1 = response.data)
//                .catch(error => console.log(error));


//            axios.get('../api/subtemas/' + this.form.temaSecundario_id)
//                .then(response => this.subtemas2 = response.data)
//                .catch(error => console.log(error));

        },
        methods: {
            adicionaResponsavel () {
                this.form.responsaveis.push(
                    {nome: '', telefone: '', email: ''}
                )
            },
            adicionaLocaisDatas () {
                this.form.locaisDatas.push(
                    { ativo: true, uf: '', cidade: '', bairro: '', dataImplantacao: ''}
                )
            },
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/admin/tecnologias/update/' + this.tecnologia.id)
                        .then(({data}) => {
                            window.location.href = '/admin/tecnologias'
                        })
                } else {
                    this.form.post('/admin/tecnologias/create')
                        .then(({data}) => {
                            window.location.href = '/admin/tecnologias'
                        })
                }
            },

        },
        watch: {
            'form.tema_id': function (val, oldVal) {
                axios.get('/api/subtemas/' + this.form.tema_id)
                    .then(response => this.subtemas1 = response.data)
                    .catch(error => console.log(error))

//
//                $("#temaSecundario_id option").each(function() {
//                    $(this).remove();
//                });
//
//                this.temas.forEach(function(item, index){
//                    $("#temaSecundario_id").append('<option value="'+item.id+'" nome="'+tema.nome+'">'+ item.nome + '</option>');
//                });
//
//                let nome = $('#tema_id :selected').attr("nome");
//                let teste =  $('#temaSecundario_id option[nome="'+ nome +'"]').remove();
            },

            'form.temaSecundario_id': function (val, oldVal) {
                axios.get('/api/subtemas/' + this.form.temaSecundario_id)
                    .then(response => this.subtemas2 = response.data)
                    .catch(error => console.log(error));
            },
        },
    };
</script>
