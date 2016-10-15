<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapitaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('captain', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administradorId')->unsigned();            
            $table->foreign('administradorId')->references('id')->on('administrator'); 
            $table->integer('esporteId')->unsigned();            
            $table->foreign('esporteId')->references('id')->on('esporte');         
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
        Schema::drop('captain');
    }
}
