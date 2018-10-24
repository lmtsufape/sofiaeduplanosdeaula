<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentecurricularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentecurriculars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('areaconhecimento_id')->unsigned();
            $table->foreign('areaconhecimento_id')
            		->references('id')
            		->on('areaconhecimentos');
                        
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
        Schema::dropIfExists('componentecurriculars');
    }
}
