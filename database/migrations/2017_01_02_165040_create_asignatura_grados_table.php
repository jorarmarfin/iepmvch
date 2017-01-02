<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idgrado')->nullable();
            $table->integer('idasignatura')->nullable();
            $table->integer('idseccion')->nullable();
            $table->integer('practicas')->nullable();
            $table->boolean('activo')->nullable();
            $table->timestamps();
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idasignatura')->references('id')->on('asignatura');
            $table->foreign('idseccion')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_grado');
    }
}
