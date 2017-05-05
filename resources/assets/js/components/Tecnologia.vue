<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>
            <alert-errors :form="form" message="There were some problems with your input."></alert-errors>



            <div class="form-group" :class="{ 'has-error': form.errors.has('titulo') }">
                <label for="titulo" class="col-md-3 control-label">Título</label>
                <div class="col-md-6">

                    <input v-model="form.titulo" type="text" name="titulo" id="titulo"
                           class="form-control">
                    <has-error :form="form" field="titulo"></has-error>
                </div>
            </div>


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


            <div class="form-group" :class="{ 'has-error': form.errors.has('tempoImplantacao') }">
                <label for="tempoImplantacao" class="col-md-3 control-label">Tempo de implantação</label>
                <div class="col-md-6">
                    <input type="number" name="tempoImplantacao" id="tempoImplantacao"
                           v-model="form.tempoImplantacao">
                    <has-error :form="form" field="tempoImplantacao"></has-error>
                </div>
            </div>


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
                        <option v-for="tema in temas" v-bind:value="tema.id">
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
                        <option v-for="tema in temas" v-bind:value="tema.id">
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
                subtemas1: [],
                subtemas2: [],
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
                    valorEstimado: this.tecnologia.valorEstimado,
                    valorHumanos: this.tecnologia.valorHumanos,
                    depoimentoLivre: this.tecnologia.depoimentoLivre,
//                    instituicao_id: this.tecnologia.instituicaos_id,
//                    TODO Nao esquecer de tirar depois
                    instituicao_id: 1,
                })
            };
        },
        props: ['tecnologia', 'categorias', 'temas'],
        mounted() {
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/tecnologias/update/' + this.tecnologia.id)
                        .then(({data}) => {
                            window.location.href = '/tecnologias'
                        })
                } else {
                    this.form.post('/tecnologias/create')
                        .then(({data}) => {
                            window.location.href = '/tecnologias'
                        })
                }
            },

        },
        watch: {
            'form.tema_id': function (val, oldVal) {
                axios.get('../api/subtemas/' + this.form.tema_id)
                    .then(response => this.subtemas1 = response.data)
                    .catch(error => console.log(error));
            },
            'form.temaSecundario_id': function (val, oldVal) {
                axios.get('../api/subtemas/' + this.form.temaSecundario_id)
                    .then(response => this.subtemas2 = response.data)
                    .catch(error => console.log(error));
            },
        },

    };
</script>
