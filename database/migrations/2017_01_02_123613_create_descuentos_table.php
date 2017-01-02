<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumtext('descripcion')->nullable();
            $table->decimal('valor','5','3')->nullable();
            $table->date('fechainicial')->nullable();
            $table->date('fechafinal')->nullable();
            $table->integer('idmatricula')->nullable();
            $table->integer('idnivel')->nullable();
            $table->integer('idtipo')->nullable();
            $table->boolean('activo')->nullable()->default(true);
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
        Schema::dropIfExists('descuento');
    }
}
