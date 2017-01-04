<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaautorizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return vpopmail_del_domain(domain)
     */
    public function up()
    {
        Schema::create('persona_autorizada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200)->nullable();
            $table->string('dni',20)->nullable();
            $table->string('telefono',50)->nullable();
            $table->integer('idalumno')->nullable();
            $table->integer('idparentesco')->nullable();
            $table->timestamps();
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idparentesco')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_autorizada');
    }
}
