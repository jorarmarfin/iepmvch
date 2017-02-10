<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('viveconestudiante')->nullable();
            $table->string('paterno',25)->nullable()->index();
            $table->string('materno',25)->nullable()->index();
            $table->string('nombres',50)->nullable()->index();
            $table->string('dni',20)->nullable()->index()->unique();
            $table->date('fechanacimiento')->nullable();
            $table->integer('idpais')->nullable();
            $table->integer('idubigeonacimiento')->nullable();
            $table->string('religion',100)->nullable();
            $table->integer('idestadocivil')->nullable();
            $table->string('gradoinstruccion',100)->nullable();
            $table->string('profesion',100)->nullable();
            $table->mediumtext('direccion')->nullable();
            $table->string('celular',50)->nullable();
            $table->string('telefonofijo',50)->nullable();
            $table->string('telefonolaboral',50)->nullable();
            $table->string('email',100)->nullable();
            $table->integer('idtipo')->nullable();
            $table->boolean('autorizo')->default(false);
            $table->integer('idsexo')->nullable();
            $table->boolean('esapoderado')->default(false);
            $table->integer('idusuario')->nullable();
            $table->integer('idubigeo')->nullable();
            $table->timestamps();
            $table->foreign('idpais')->references('id')->on('catalogo');
            $table->foreign('idubigeonacimiento')->references('id')->on('catalogo');
            $table->foreign('idubigeo')->references('id')->on('catalogo');
            $table->foreign('idestadocivil')->references('id')->on('catalogo');
            $table->foreign('idtipo')->references('id')->on('catalogo');
            $table->foreign('idsexo')->references('id')->on('catalogo');
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
        Schema::dropIfExists('familiar');
    }
}
