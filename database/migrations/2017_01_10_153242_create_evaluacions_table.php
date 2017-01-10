<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmas')->nullable();
            $table->integer('indicador')->nullable();
            $table->decimal('nota',8,3)->nullable();
            $table->timestamps();
            $table->foreign('idmas')->references('id')->on('matricula_asignatura_seccion');
            $table->foreign('indicador')->references('id')->on('indicador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion');
    }
}
