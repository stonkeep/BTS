<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePublicosAlvoTecnologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicos_alvo_tecnologia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tecnologia_id')->unsigned()->nullable();
            $table->foreign('tecnologia_id')->references('id')
                ->on('tecnologias')->onDelete('cascade');
            $table->integer('publicos_alvo_id')->unsigned()->nullable();
            $table->foreign('publicos_alvo_id')->references('id')
                ->on('publicos_alvos')->onDelete('cascade');
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
            Schema::dropIfExists('publicos_alvo_tecnologia');
    }
}
