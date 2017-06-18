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
            $table->integer('tempoImplantacao');
            $table->boolean('emAtividade');
            $table->boolean('inscricaoAnterior');
            $table->boolean('investimentoFBB');
            $table->unsignedInteger('categoria_id');
            $table->text('resumo');
            $table->unsignedInteger('tema_id');
            $table->unsignedInteger('temaSecundario_id');
            $table->text('problema');
            $table->text('objetivoGeral');
            $table->text('objetivoEspecifico');
            $table->text('descricao');
            $table->text('resultadosAlcancados');
            $table->text('recursosMateriais'); //Recursos materiais necessários para a implementação de uma unidade da tecnologia
            $table->text('recursosHumanos'); //Recursos materiais necessários para a implementação de uma unidade da tecnologia
            $table->text('valorEstimado'); //Valor estimando para implementação de uma unidade da tecnologia social
            $table->text('valorHumanos'); //Recursos Humanos para implementação da tecnologia de uma unidade de TS
            $table->text('depoimentoLivre');
            $table->unsignedInteger('instituicao_id');
            $table->timestamps();
//            $table->foreign('instituicao_id')->references('id')->on('instituicaos')->onDelete('restrict');
//                $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('restrict');
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
