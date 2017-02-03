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
            $table->integer('idproducto')->nullable();
            $table->decimal('preciounitario','12','2')->nullable();
            $table->decimal('descuento','12','2')->default(0);
            $table->decimal('montoigv','12','2')->nullable();
            $table->integer('idtipoigv')->nullable();

            $table->decimal('subtotal','12','2')->nullable();
            $table->decimal('total','12','2')->nullable();
            $table->timestamps();
            $table->foreign('idcaja')->references('id')->on('caja');
            $table->foreign('idtipoigv')->references('id')->on('catalogo');
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
