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
            $table->integer('idum')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('idproducto')->nullable();
            $table->mediumtext('descripcion')->nullable();
            $table->decimal('preciounitario','12','10')->nullable();

            $table->integer('idtipoentrada')->nullable();
            $table->integer('idtipoigv')->nullable();
            $table->integer('idtipodocumento')->nullable();
            $table->decimal('subtotal','10','3')->nullable();
            $table->decimal('total','10','3')->nullable();
            $table->timestamps();
            $table->foreign('idcaja')->references('id')->on('caja');
            $table->foreign('idtipoentrada')->references('id')->on('catalogo');
            $table->foreign('idum')->references('id')->on('catalogo');
            $table->foreign('idtipoigv')->references('id')->on('catalogo');
            $table->foreign('idtipodocumento')->references('id')->on('catalogo');
            $table->foreign('idproducto')->references('id')->on('producto');
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
