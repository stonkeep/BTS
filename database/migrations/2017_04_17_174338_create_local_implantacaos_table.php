<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalImplantacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_implantacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('ativo')->default(false);
            $table->string('uf', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->date('dataImplantacao');
            $table->integer('tecnologia_id')->unsigned();
            $table->foreign('tecnologia_id')
                ->references('id')->on('tecnologias')
                ->onDelete('cascade');
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
        Schema::dropIfExists('local_implantacaos');
    }
}
