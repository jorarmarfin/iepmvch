<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->nullable();
            $table->time('horainicio')->nullable();
            $table->time('horafin')->nullable();
            $table->integer('idasignaturagrado')->nullable();
            $table->integer('iddiasemana')->nullable();
            $table->timestamps();
            $table->foreign('idasignaturagrado')->references('id')->on('asignatura_grado');
            $table->foreign('iddiasemana')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario');
    }
}
