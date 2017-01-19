<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idalumno')->nullable();
            $table->integer('idfamiliar')->nullable();
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idfamiliar')->references('id')->on('familiar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_familiar');
    }
}
