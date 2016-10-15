<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->binary('logo');
            $table->boolean('ativo');
            $table->integer('esporteId')->unsigned();
            $table->foreign('esporteId')->references('id')->on('esporte');            
            $table->integer('atleticaId')->unsigned();
            $table->foreign('atleticaId')->references('id')->on('atletica'); 
            $table->integer('alunoId')->unsigned();
            $table->foreign('alunoId')->references('id')->on('student'); 
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
        Schema::drop('team');
    }
}
