<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_asignatura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpersonal')->nullable();
            $table->integer('idasignaturagradoseccion')->nullable();
            $table->boolean('tutor')->nullable()->default(true);
            $table->boolean('notas')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('idpersonal')->references('id')->on('personal');
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
        Schema::dropIfExists('personal_asignatura');
    }
}
