<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_practica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idperiodoacademico')->nullable();
            $table->boolean('pc01')->default(false);
            $table->boolean('pc02')->default(false);
            $table->boolean('pc03')->default(false);
            $table->boolean('pc04')->default(false);
            $table->boolean('pc05')->default(false);
            $table->boolean('pc06')->default(false);
            $table->boolean('pc07')->default(false);
            $table->boolean('pc08')->default(false);
            $table->boolean('pc09')->default(false);
            $table->boolean('pc10')->default(false);
            $table->boolean('examen')->default(false);
            $table->boolean('comportamiento')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo_practica');
    }
}
