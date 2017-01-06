<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradoSeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idgrado')->nullable();
            $table->integer('idseccion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->timestamps();
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idseccion')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grado_seccion');
    }
}
