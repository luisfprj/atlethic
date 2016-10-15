<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timeId')->unsigned();
            $table->foreign('timeId')->references('id')->on('team'); 
            $table->integer('alunoId')->unsigned();
            $table->foreign('alunoId')->references('id')->on('student');
            $table->enum('status',['Aguardando','Negado','Aprovado']);
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
        //
    }
}
