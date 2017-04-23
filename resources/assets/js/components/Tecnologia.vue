<template>
    <div class="container">
        <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
            <alert-error :form="form"></alert-error>

            <div class="form-group" :class="{ 'has-error': form.errors.has('titulo') }">
                <label for="titulo" class="col-md-3 control-label">Título</label>
                <div class="col-md-6">
                    <input v-model="form.titulo" type="descricao" name="titulo" id="titulo"
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
                    <input type="number" name="tempoImplantacao" id="tempoImplantacao" value="0"
                           v-model="form.tempoImplantacao">
                    <has-error :form="form" field="tempoImplantacao"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('emAtividade') }">
                <label for="titulo" class="col-md-3 control-label">Em Atividade:</label>
                <div class="col-md-6">
                    <input type="radio" name="emAtividade" id="emAtividadeNao" value="0" v-model="form.emAtividade">
                    <label for="emAtividadeNao">Sim</label>
                    <br>
                    <input type="radio" name="emAtividade" id="emAtividadeSim" value="1" v-model="form.emAtividade">
                    <label for="emAtividadeSim">Não</label>
                    <has-error :form="form" field="emAtividade"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('inscricaoAnterior') }">
                <label for="titulo" class="col-md-3 control-label">Iscrições Anteriores:</label>
                <div class="col-md-6">
                    <input type="radio" name="inscricaoAnterior" id="inscricaoAnteriorNao" value="0" v-model="form.inscricaoAnterior">
                    <label for="inscricaoAnteriorNao">Sim</label>
                    <br>
                    <input type="radio" name="emAtividade" id="inscricaoAnteriorSim" value="1" v-model="form.inscricaoAnterior">
                    <label for="inscricaoAnteriorSim">Não</label>
                    <has-error :form="form" field="inscricaoAnterior"></has-error>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': form.errors.has('investimentoFBB') }">
                <label for="titulo" class="col-md-3 control-label">Iscrições Anteriores:</label>
                <div class="col-md-6">
                    <input type="radio" name="investimentoFBB" id="investimentoFBBNao" value="0" v-model="form.investimentoFBB">
                    <label for="investimentoFBBNao">Sim</label>
                    <br>
                    <input type="radio" name="emAtividade" id="investimentoFBBSim" value="1" v-model="form.investimentoFBB">
                    <label for="investimentoFBBSim">Não</label>
                    <has-error :form="form" field="investimentoFBB"></has-error>
                </div>
            </div>


            <div class="form-group" :class="{ 'has-error': form.errors.has('categoria_id') }">
                <label for="categoria_id" class="col-md-3 control-label">Categoria: </label>
                <div class="col-md-6">
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
                    <textarea rows="4" cols="50" v-model="form.resumo" type="descricao" name="resumo" id="resumo"
                           class="form-control">
                    </textarea>
                    <has-error :form="form" field="resumo"></has-error>
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
                    numeroInscricao: '',
                    titulo: '',
                    fimLucrativo: '',
                    tempoImplantacao: '',
                    emAtividade: '',
                    inscricaoAnterior: '',
                    investimentoFBB: '',
                    categoria_id: '',
                    resumo: '',
                    tema_id: '',
                    temaSecundario_id: '',
                    problema: '',
                    objetivoGeral: '',
                    objetivoEspecifico: '',
                    descricao: '',
                    resultadosAlcancados: '',
                    recursosMateriais: '',
                    valorEstimado: '',
                    valorHumanos: '',
                    depoimentoLivre: '',
                    instituicaos_id: '',
                })
            }
        },
        props: ['tecnologia', 'categorias'],
        mounted() {
            console.log('Component Tecnologia.');
        },
        methods: {
            submit () {
                // Submit the form via a POST request
                var location = window.location.href;
                this.form.tema_id = this.selected;
                if (location.indexOf("edit") > -1) {
                    this.form.put('/tecnologias/update/' + this.id)
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
        }

    };
</script>
