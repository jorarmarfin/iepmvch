<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',200)->nullable();
            $table->integer('idareaacademica')->nullable();
            $table->decimal('peso','8','3')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('idareaacademica')->references('id')->on('area_academica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura');
    }
}
