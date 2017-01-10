<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->integer('idtipo')->nullable();
            $table->decimal('nota',8,3)->nullable();
            $table->timestamps();
            $table->foreign('idmatricula')->references('id')->on('matricula');
            $table->foreign('idtipo')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practica');
    }
}
