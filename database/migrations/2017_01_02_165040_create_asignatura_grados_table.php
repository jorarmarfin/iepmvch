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
        Schema::create('asignatura_grado_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idgradoseccion')->nullable();
            $table->integer('idasignatura')->nullable();
            $table->integer('practicas')->nullable()->default(6);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->foreign('idgradoseccion')->references('id')->on('grado_seccion');
            $table->foreign('idasignatura')->references('id')->on('asignatura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_grado_seccion');
    }
}
