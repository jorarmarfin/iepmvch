<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComportamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comportamiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idperiodoacademico')->nullable();
            $table->integer('idgradoseccion')->nullable();
            $table->integer('idmatricula')->nullable();
            $table->char('nota',2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comportamiento');
    }
}
