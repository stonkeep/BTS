<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsticuicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insticuicoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('CNPJ');
            $table->string('razaoSocial');
            $table->unsignedInteger('naturezas_juridicas_id');
            $table->string('nomeDaArea');
            $table->unsignedInteger('ddd');
            $table->unsignedInteger('telefone');
            $table->string('emai');
            $table->string('UF', 2);
            $table->string('cidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->unsignedInteger('CEP');
            $table->string('site');
            // talvez outra tabela
            $table->string('nomeCompleto');
            $table->unsignedInteger('cargos_id');
            $table->string('sexo', 1);
            $table->unsignedInteger('CPF', 11);
            $table->timestamps();
            
            $table->unique('CNPJ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insticuicoes');
    }
}
