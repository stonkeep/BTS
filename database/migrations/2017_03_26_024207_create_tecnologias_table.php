<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnologias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numeroInscricao');
            $table->string('titulo');
            $table->boolean('fimLucrativo');
            $table->boolean('tempoImplantacao');
            $table->boolean('emAtividade');
            $table->boolean('inscricaoAnterior');
            $table->boolean('investimentoFBB');
            $table->boolean('categoria_id');
            $table->unsignedInteger('categoria_id');
            $table->text('resumo');
            $table->unsignedInteger('tema_id');
            $table->unsignedInteger('temaSecundario_id');
            $table->unsignedInteger('temaSecundario_id');
            $table->text('problema');
            $table->text('objetivoGeral');
            $table->text('objetivoEspecifico');
            $table->text('descricao');
            $table->text('resultadosAlcancados');
            $table->text('recursosMateriais'); //Recursos materiais necessários para a implementação de uma unidade da tecnologia
            $table->text('valorEstimado'); //Valor estimando para implementação de uma unidade da tecnologia social
            $table->text('valorHumanos'); //Recursos Humanos para implementação da tecnologia de uma unidade de TS
            $table->text('depoimento Livre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnologias');
    }
}
