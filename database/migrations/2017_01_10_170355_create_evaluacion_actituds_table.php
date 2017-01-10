<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionActitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_actitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmas')->nullable();
            $table->integer('idactitud')->nullable();
            $table->integer('idperiodicoacademico')->nullable();
            $table->decimal('nota',8,3)->nullable();
            $table->timestamps();
            $table->foreign('idmas')->references('id')->on('matricula_asignatura_seccion');
            $table->foreign('idactitud')->references('id')->on('actitud');
            $table->foreign('idperiodicoacademico')->references('id')->on('catalogo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion_actitud');
    }
}
