<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnologiaSubTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_temas_tecnologia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tecnologia_id');
            $table->foreign('tecnologia_id')->references('id')
                ->on('tecnologias')->onDelete('cascade');
            $table->unsignedInteger('sub_temas_id');
            $table->foreign('sub_temas_id')->references('id')
                ->on('sub_temas')->onDelete('restrict');
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
        Schema::dropIfExists('sub_temas_tecnologia');
    }
}
