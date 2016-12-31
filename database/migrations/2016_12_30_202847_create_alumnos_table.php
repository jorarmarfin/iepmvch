<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');

            $table->string('paterno',25)->nullable();
            $table->string('materno',25)->nullable();
            $table->string('nombres',50)->nullable();
            $table->string('dni',20)->nullable();
            $table->integer('idsubnivel')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->integer('idubigeonacimiento')->nullable();
            $table->integer('idpais')->nullable();
            $table->string('religion',100)->nullable();
            $table->boolean('bautismo')->nullable();
            $table->boolean('comunion')->nullable();
            $table->boolean('confirmacion')->nullable();
            $table->integer('idubigeo')->nullable();
            $table->string('direccion',100)->nullable();

            $table->timestamps();
            $table->foreign('idsubnivel')->references('references')->on('catalogo');
            $table->foreign('idubigeonacimiento')->references('references')->on('catalogo');
            $table->foreign('idpais')->references('references')->on('catalogo');
            $table->foreign('idubigeo')->references('references')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
