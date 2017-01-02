<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paterno',25)->nullable()->index();
            $table->string('materno',25)->nullable()->index();
            $table->string('nombres',50)->nullable()->index();
            $table->string('dni',20)->nullable()->index();
            $table->date('fechanacimiento')->nullable();
            $table->integer('idpais')->nullable();
            $table->integer('idubigeonacimiento')->nullable();
            $table->string('email',150)->nullable();
            $table->integer('idestadocivil')->nullable();
            $table->integer('numerohijos')->nullable();
            $table->integer('idubigeo')->nullable();
            $table->mediumtext('direccion')->nullable();
            $table->string('telefonofijo',50)->nullable();
            $table->string('celular',50)->nullable();
            $table->string('universidad',100)->nullable();
            $table->boolean('culmino')->nullable();
            $table->mediumtext('carrera')->nullable();
            $table->integer('idgestionuniversidad')->nullable();
            $table->mediumtext('gradoobtenido')->nullable();
            $table->date('fechaegreso')->nullable();
            $table->string('numerocolegiatura',50)->nullable();
            $table->integer('idsistemapension')->nullable();
            $table->string('afp',200)->nullable();
            $table->boolean('vigente')->nullable();
            $table->integer('llamadaatencion')->nullable();
            $table->integer('memo')->nullable();
            $table->boolean('activo')->nullable();
            $table->integer('idtipo')->nullable();



            $table->timestamps();
            $table->foreign('idpais')->references('id')->on('catalogo');
            $table->foreign('idubigeonacimiento')->references('id')->on('catalogo');
            $table->foreign('idestadocivil')->references('id')->on('catalogo');
            $table->foreign('idubigeo')->references('id')->on('catalogo');
            $table->foreign('idgestionuniversidad')->references('id')->on('catalogo');
            $table->foreign('idsistemapension')->references('id')->on('catalogo');
            $table->foreign('idtipo')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
