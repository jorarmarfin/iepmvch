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
            $table->date('fechaemision')->nullable();
            $table->integer('ididentificacion')->nullable();
            $table->string('numidentificacion',15)->nullable();
            $table->string('razonsocial',100)->nullable();
            $table->integer('idtipomoneda')->nullable();
            $table->decimal('total_gravado','12','2')->default(0);
            $table->decimal('total_inafecto','12','2')->default(0);
            $table->decimal('total_exonerado','12','2')->default(0);
            $table->decimal('total_venta','12','2')->nullable();

            $table->string('prefijo',3)->nullable();
            $table->integer('serie')->nullable();
            $table->bigInteger('numero')->nullable();


            $table->integer('idmatricula')->nullable();
            $table->decimal('entrada','12','2')->nullable();
            $table->decimal('salida','12','2')->nullable();
            $table->decimal('saldo','12','2')->nullable();
            $table->timestamps();
            $table->foreign('idmatricula')->references('id')->on('matricula');
            $table->foreign('ididentificacion')->references('id')->on('catalogo');
            $table->foreign('idtipomoneda')->references('id')->on('catalogo');
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
