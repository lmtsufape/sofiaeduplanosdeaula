<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('software');
            $table->string('autores')->nullable();
            $table->string('contato')->nullable();
            $table->string('fonte')->nullable();
            $table->integer('nivel');
            $table->integer('campoexperiencia_id')->unsigned()->nullable();
            $table->integer('areatematica_id')->unsigned()->nullable();
            $table->integer('componentecurricular_id')->unsigned()->nullable();
            $table->integer('areaconhecimento_id')->unsigned()->nullable();
            $table->string('arquivo')->nullable();

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
        Schema::dropIfExists('planos');
    }
}
