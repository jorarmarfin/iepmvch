<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservapsicologicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_psicologica', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha')->nullable();
            $table->string('persona',200)->nullable();
            $table->integer('idgrado')->nullable();
            $table->mediumtext('motivo')->nullable();
            $table->mediumtext('observacion')->nullable();
            $table->integer('idpersonal')->nullable();
            $table->integer('idestado')->nullable();
            $table->mediumtext('resultado')->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();
            $table->foreign('idpersonal')->references('id')->on('personal');
            $table->foreign('idestado')->references('id')->on('catalogo');
            $table->foreign('idgrado')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_psicologica');
    }
}
