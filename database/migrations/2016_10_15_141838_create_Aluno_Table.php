<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->double('matricula')->unique();
            $table->string('email')->unique();
            $table->string('senha');
            $table->rememberToken();
            $table->string('telefone');
            $table->enum('turno', ['matutino','vespertino','noturno']);          
            $table->integer('cursoId')->unsigned();            
            $table->foreign('cursoId')->references('id')->on('course');         
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
        Schema::drop('student');
    }
}
