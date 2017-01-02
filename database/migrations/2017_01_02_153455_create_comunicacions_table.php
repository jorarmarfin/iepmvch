<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idremitente')->nullable();
            $table->integer('iddestinatario')->nullable();
            $table->mediumtext('mensaje')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->integer('idtipo')->nullable();
            $table->integer('idestado')->nullable();
            $table->timestamps();
            $table->foreign('idtipo')->references('id')->on('catalogo');
            $table->foreign('idestado')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicacion');
    }
}
