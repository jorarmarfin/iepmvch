<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idnivel')->nullable();
            $table->string('ciclo',20)->nullable();
            $table->mediumtext('nombre')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('idarea')->nullable();
            $table->integer('indicadores')->nullable();
            $table->foreign('idnivel')->references('id')->on('catalogo');
            $table->foreign('idarea')->references('id')->on('catalogo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencia');
    }
}
