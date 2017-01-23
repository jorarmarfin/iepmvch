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
            $table->integer('idgradoseccion')->nullable();
            $table->integer('idtipo')->nullable();
            $table->string('year',4)->nullable();
            $table->timestamps();
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idgradoseccion')->references('id')->on('grado_seccion');
            $table->foreign('idtipo')->references('id')->on('catalogo');
            $table->unique(['idalumno','idgradoseccion','idtipo','year']);
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