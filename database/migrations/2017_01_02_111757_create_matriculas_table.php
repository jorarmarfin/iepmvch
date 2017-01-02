<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idalumno')->nullable();
            $table->integer('idgrado')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->integer('idestadoacademico')->nullable();
            $table->timestamps();
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idestadoacademico')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}