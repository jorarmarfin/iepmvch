<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadHorariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidad_horaria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpersonal')->nullable();
            $table->integer('iddia')->nullable();
            $table->time('inicio')->nullable();
            $table->time('fin')->nullable();
            $table->foreign('idpersonal')->references('id')->on('personal');
            $table->foreign('iddia')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidad_horaria');
    }
}
