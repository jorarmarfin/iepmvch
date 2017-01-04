<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pension', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idnivel')->nullable();
            $table->decimal('monto','8','3')->nullable();
            $table->boolean('activo')->nullable();
            $table->timestamps();
            $table->foreign('idnivel')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pension');
    }
}
