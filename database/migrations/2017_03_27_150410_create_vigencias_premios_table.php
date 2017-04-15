<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVigenciasPremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vigencias_premios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edicao');
            $table->date('data_abertura');
            $table->date('data_encerramento');
            $table->boolean('encerrado')->default(true);
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
        Schema::dropIfExists('vigencias_premios');
    }
}
