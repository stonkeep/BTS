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
        Schema::create('instituicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('CNPJ');
            $table->string('razaoSocial');
            $table->unsignedInteger('naturezaJuridica');
            $table->string('nomeDaArea');
            $table->unsignedInteger('ddd');
            $table->unsignedInteger('telefone');
            $table->string('email');
            $table->string('UF', 2);
            $table->string('cidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->unsignedInteger('CEP');
            $table->string('site')->nullable();
            // talvez outra tabela
            $table->string('nomeCompleto');
            $table->unsignedInteger('cargo_id');
            $table->string('sexo', 1);
            $table->bigInteger('CPF');
            $table->timestamps();
            $table->index('razaoSocial');
            $table->index('cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicaos');
    }
}
