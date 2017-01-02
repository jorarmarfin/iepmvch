<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHermanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hermano', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',200)->nullable()->index();
            $table->mediumtext('descripcion')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('idalumno')->nullable();
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
        Schema::dropIfExists('hermano');
    }
}
