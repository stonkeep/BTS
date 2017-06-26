<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaIndexsTecnologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tecnologias', function (Blueprint $table) {
            DB::statement('ALTER TABLE tecnologias ADD FULLTEXT INDEX resumo_index(resumo)');
            DB::statement('ALTER TABLE tecnologias ADD FULLTEXT INDEX problema_index(problema)');
            DB::statement('ALTER TABLE tecnologias ADD FULLTEXT INDEX objetivoGeral_index(objetivoGeral)');
            DB::statement('ALTER TABLE tecnologias ADD FULLTEXT INDEX objetivoEspecifico_index(objetivoEspecifico)');
            DB::statement('ALTER TABLE tecnologias ADD FULLTEXT INDEX descricao_index(descricao)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tecnologias', function (Blueprint $table) {
            //
        });
    }
}
