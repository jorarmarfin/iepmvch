<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',200)->nullable()->index();
            $table->string('telefonos',200)->nullable()->index();
            $table->string('email',200)->nullable()->index();
            $table->string('dni',20)->nullable()->index();
            $table->integer('idgrado')->nullable();
            $table->integer('idasignatura')->nullable();
            $table->mediumtext('observacion')->nullable();
            $table->date('fechaentrevista')->nullable();
            $table->integer('idestado')->nullable();
            $table->timestamps();
            $table->foreign('idgrado')->references('id')->on('grado');
            $table->foreign('idasignatura')->references('id')->on('asignatura');
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
        Schema::dropIfExists('postulante');
    }
}
