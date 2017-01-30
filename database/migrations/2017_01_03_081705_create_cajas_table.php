<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recibi',200)->nullable();
            $table->string('dni',20)->nullable();
            $table->string('cantidad',200)->nullable();
            $table->decimal('monto','10','3')->nullable();
            $table->decimal('valortotal','10','3')->nullable();
            $table->mediumtext('concepto')->nullable();
            $table->integer('idalumno')->nullable();
            $table->integer('idgrado')->nullable();
            $table->decimal('entrada','10','3')->nullable();
            $table->decimal('salida','10','3')->nullable();
            $table->decimal('saldo','10','3')->nullable();
            $table->integer('idmatricula')->nullable();
            $table->integer('idtipo')->nullable();
            $table->integer('idigv')->nullable();
            $table->mediumtext('descripcion')->nullable();
            $table->timestamps();
            $table->foreign('idmatricula')->references('id')->on('matricula');
            $table->foreign('idtipo')->references('id')->on('catalogo');
            $table->foreign('idigv')->references('id')->on('catalogo');
            $table->foreign('idalumno')->references('id')->on('alumno');
            $table->foreign('idgrado')->references('id')->on('grado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caja');
    }
}
