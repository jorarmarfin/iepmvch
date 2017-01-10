<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTrimestralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_trimestral', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmas')->nullable();
            $table->integer('idperiodoacademico')->nullable();
            $table->decimal('promedio_logro',8,3)->nullable();
            $table->decimal('promedio_actitud',8,3)->nullable();
            $table->decimal('examen_trimestral',8,3)->nullable();
            $table->decimal('promedio_trimestral',8,3)->nullable();
            $table->decimal('comportamiento',8,3)->nullable();
            $table->mediumtext('recomendaciones')->nullable();
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
        Schema::dropIfExists('nota_trimestral');
    }
}
