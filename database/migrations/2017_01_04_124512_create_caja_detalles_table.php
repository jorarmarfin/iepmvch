<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcaja')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('idtipoentrada')->nullable();
            $table->decimal('monto','8','3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caja_detalle');
    }
}
