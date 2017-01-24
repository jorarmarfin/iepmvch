<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200)->nullable();
            $table->string('razonsocial',200)->nullable();
            $table->string('resolucion',200)->nullable();
            $table->mediumtext('direccion')->nullable();
            $table->integer('idubigeo')->nullable();
            $table->string('director',200)->nullable();
            $table->string('telefonos',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('web',100)->nullable();
            $table->string('ruc',50)->nullable();
            $table->string('serie',10)->nullable();
            $table->biginteger('inicio')->nullable();
            $table->biginteger('fin')->nullable();
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
        Schema::dropIfExists('institucion');
    }
}
