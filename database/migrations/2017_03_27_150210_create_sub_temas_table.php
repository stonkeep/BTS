<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTemasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_temas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('tema_id')->unsigned();
            $table->timestamps();
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('restrict');
            $table->index('descricao');
        });

        //Schema::table('sub_temas', function(Blueprint $table)
        //{
        //   
        //
        //});
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_temas');
    }
}
