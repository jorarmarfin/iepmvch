<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idalumno')->nullable();
            $table->boolean('aplica')->nullable();
            $table->integer('idrequisito')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('idusuario')->nullable();
            $table->boolean('activo')->nullable();
            $table->timestamps();
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idrequisito')->references('id')->on('catalogo');
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
        Schema::dropIfExists('checklist');
    }
}
