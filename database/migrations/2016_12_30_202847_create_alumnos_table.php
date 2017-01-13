<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');

            $table->string('paterno',25)->nullable()->index();
            $table->string('materno',25)->nullable()->index();
            $table->string('nombres',50)->nullable()->index();
            $table->string('dni',20)->nullable()->index();
            $table->integer('idgrado')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->integer('idpais')->nullable();
            $table->integer('idubigeonacimiento')->nullable();
            $table->string('religion',100)->nullable();
            $table->boolean('bautismo')->nullable();
            $table->boolean('comunion')->nullable();
            $table->boolean('confirmacion')->nullable();
            $table->integer('idubigeo')->nullable();
            $table->mediumtext('direccion')->nullable();
            $table->string('telefonos',100)->nullable();
            $table->string('telefonoemergencia1',100)->nullable();
            $table->string('telefonoemergencia2',100)->nullable();
            $table->boolean('respadre')->nullable();
            $table->boolean('resmadre')->nullable();
            $table->boolean('resapoderado')->nullable();
            $table->integer('idestado')->nullable();
            $table->text('observacion')->nullable();
            $table->boolean('esespecial')->nullable()->default(false);
            $table->mediumtext('discapacidad')->nullable();
            $table->timestamps();
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idubigeonacimiento')->references('id')->on('catalogo');
            $table->foreign('idpais')->references('id')->on('catalogo');
            $table->foreign('idubigeo')->references('id')->on('catalogo');
            $table->foreign('idestado')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
