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
            $table->boolean('actitud')->default(false);
            $table->boolean('cuaderno')->default(false);
            $table->boolean('in01')->default(false);
            $table->boolean('in02')->default(false);
            $table->boolean('in03')->default(false);
            $table->boolean('in04')->default(false);
            $table->boolean('in05')->default(false);
            $table->boolean('in06')->default(false);
            $table->boolean('in07')->default(false);
            $table->boolean('in08')->default(false);
            $table->boolean('in09')->default(false);
            $table->boolean('in10')->default(false);
            $table->boolean('in11')->default(false);
            $table->boolean('in12')->default(false);
            $table->boolean('in13')->default(false);
            $table->boolean('in14')->default(false);
            $table->boolean('in15')->default(false);
            $table->boolean('in16')->default(false);
            $table->boolean('in17')->default(false);
            $table->boolean('in18')->default(false);
            $table->boolean('in19')->default(false);
            $table->boolean('in20')->default(false);
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
