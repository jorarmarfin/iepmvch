<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetaNotaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_nota_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idetiquetanota')->nullable();
            $table->integer('nota')->nullable();
            $table->string('literal',3)->nullable();
            $table->timestamps();
            $table->foreign('idetiquetanota')->references('id')->on('etiqueta_nota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiqueta_nota_detalle');
    }
}
