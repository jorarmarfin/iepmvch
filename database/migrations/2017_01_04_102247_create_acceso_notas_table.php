<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesoNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceso_nota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idusuario')->nullable();
            $table->date('fechainicio')->nullable();
            $table->date('fechafinal')->nullable();
            $table->boolean('activo')->nullable();
            $table->timestamps();
            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acceso_nota');
    }
}
