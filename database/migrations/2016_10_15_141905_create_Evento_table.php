<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('data');
            $table->integer('duracao'); // minutos
            $table->string('local');
            $table->integer('atleticaId')->unsigned();
            $table->foreign('atleticaId')->references('id')->on('atlethic');
            $table->integer('administradorId')->unsigned();
            $table->foreign('administradorId')->references('id')->on('administrator');
            $table->string('informacoes');
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
        Schema::drop('event');
    }
}
