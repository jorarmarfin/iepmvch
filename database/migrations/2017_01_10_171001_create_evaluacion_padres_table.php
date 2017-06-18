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
            $table->integer('idperiodoacademico')->nullable();
            $table->integer('idmatricula')->nullable();
            $table->char('ap1',2)->nullable();
            $table->char('ap2',2)->nullable();
            $table->char('ap3',2)->nullable();
            $table->char('ap4',2)->nullable();
            $table->char('ap5',2)->nullable();
            $table->char('ap6',2)->nullable();
            $table->char('ap7',2)->nullable();
            $table->char('ap8',2)->nullable();
            $table->char('ap9',2)->nullable();
            $table->char('ap10',2)->nullable();
            $table->char('ap11',2)->nullable();
            $table->char('ap12',2)->nullable();
            $table->mediumtext('comentario')->nullable();
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
