<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionPadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_padre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->integer('idaccionprincipal')->nullable();
            $table->decimal('t1',8,3)->nullable();
            $table->decimal('t2',8,3)->nullable();
            $table->decimal('t3',8,3)->nullable();
            $table->timestamps();
            $table->foreign('idmatricula')->references('id')->on('matricula');
            $table->foreign('idaccionprincipal')->references('id')->on('accion_principal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion_padre');
    }
}
