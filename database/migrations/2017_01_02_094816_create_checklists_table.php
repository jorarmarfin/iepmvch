<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->boolean('aplica')->nullable()->default(true);
            $table->integer('idrequisito')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('idusuario')->nullable();
            $table->boolean('activo')->nullable();

            $table->foreign('idmatricula')->references('id')->on('matricula');
            $table->foreign('idrequisito')->references('id')->on('catalogo');
            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
}
