<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreatematicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areatematicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('componentecurricular_id')->unsigned();
            
            $table->foreign('componentecurricular_id')->references('id')
            		->on('componentecurriculars');
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
        Schema::dropIfExists('areatematicas');
    }
}
