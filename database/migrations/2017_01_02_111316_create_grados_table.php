<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idnivel')->nullable();
            $table->string('ciclo',20)->nullable();
            $table->string('codigo',50)->nullable();
            $table->string('nombre',150)->nullable();
            $table->string('siguiente',150)->nullable();
            $table->boolean('activo')->nullable();
            $table->timestamps();
            $table->foreign('idnivel')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grado');
    }
}
