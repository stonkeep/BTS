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
