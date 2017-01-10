<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actitud', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumtext('nombre')->nullable();
            $table->string('orden',5)->nullable();
            $table->boolean('activo')->nullable();
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
        Schema::dropIfExists('actitud');
    }
}
