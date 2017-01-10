<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumtext('nombre')->nullable();
            $table->integer('idcompetencia')->nullable();
            $table->integer('idperiodoacademico')->nullable();
            $table->integer('idasignaturagradoseccion')->nullable();
            $table->string('orden',5)->nullable();
            $table->boolean('activo')->nullable();
            $table->foreign('idcompetencia')->references('id')->on('competencia');
            $table->foreign('idperiodoacademico')->references('id')->on('catalogo');
            $table->foreign('idasignaturagradoseccion')->references('id')->on('asignatura_grado_seccion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicador');
    }
}
