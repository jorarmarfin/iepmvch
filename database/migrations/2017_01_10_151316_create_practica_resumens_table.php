<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticaResumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica_resumen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->integer('idasignaturagradoseccion')->nullable();
            $table->decimal('pc1_n',8,3)->nullable();
            $table->string('pc1_l',3)->nullable();
            $table->decimal('pc2_n',8,3)->nullable();
            $table->string('pc2_l',3)->nullable();
            $table->decimal('pc3_n',8,3)->nullable();
            $table->string('pc3_l',3)->nullable();
            $table->decimal('pc4_n',8,3)->nullable();
            $table->string('pc4_l',3)->nullable();
            $table->decimal('pc5_n',8,3)->nullable();
            $table->string('pc5_l',3)->nullable();
            $table->decimal('pc6_n',8,3)->nullable();
            $table->string('pc6_l',3)->nullable();
            $table->decimal('ppc',8,3)->nullable();
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
        Schema::dropIfExists('practica_resumen');
    }
}
