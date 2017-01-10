<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaAsignaturaSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_asignatura_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->integer('idasignaturagradoseccion')->nullable();
            $table->decimal('nota_t1_n',8,3)->nullable();
            $table->string('nota_t1_l',3)->nullable();
            $table->decimal('nota_t2_n',8,3)->nullable();
            $table->string('nota_t2_l',3)->nullable();
            $table->decimal('nota_t3_n',8,3)->nullable();
            $table->string('nota_t3_l',3)->nullable();
            $table->boolean('exonerado')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('idmatricula')->references('id')->on('matricula');
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
        Schema::dropIfExists('matricula_asignatura_seccion');
    }
}
