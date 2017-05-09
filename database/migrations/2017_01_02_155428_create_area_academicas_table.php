<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_academica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',20)->nullable();
            $table->string('nombre',150)->nullable();
            $table->string('inicial',50)->nullable();
            $table->string('primaria',50)->nullable();
            $table->string('secundaria',50)->nullable();
            $table->boolean('subarea')->nullable(true);
            $table->boolean('activo')->nullable(true);
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
        Schema::dropIfExists('area_academica');
    }
}
