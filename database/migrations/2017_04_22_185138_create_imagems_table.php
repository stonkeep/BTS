<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tecnologia_id');
            $table->string('fileName');
            $table->string('fileNamePath');
            $table->string('extension');
            $table->string('path');
            $table->string('type');
            $table->bigInteger('size');
            $table->timestamps();

            $table->foreign('tecnologia_id')->references('id')
                ->on('tecnologias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagems');
    }
}
