<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetaNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_nota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',3)->nullable();
            $table->string('rango',10)->nullable();
            $table->integer('idnivel')->nullable();
            $table->boolean('activo')->nullable()->default(true);
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
        Schema::dropIfExists('etiqueta_nota');
    }
}
