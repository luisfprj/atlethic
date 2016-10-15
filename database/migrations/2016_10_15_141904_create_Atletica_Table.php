<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtleticaTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->binary('logo');
            $table->integer('administradorId')->unsigned();
            $table->foreign('administradorId')->references('id')->on('administrator');
            $table->string('descricao');
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
        Schema::drop('atletica');
    }
}
