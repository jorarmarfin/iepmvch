<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmatricula')->nullable();
            $table->integer('idpersonalasignatura')->nullable();
            $table->integer('idperiodoacademico')->nullable();
            $table->char('in_01',2)->nullable();
            $table->char('in_02',2)->nullable();
            $table->char('in_03',2)->nullable();
            $table->char('in_04',2)->nullable();
            $table->char('in_05',2)->nullable();
            $table->char('in_06',2)->nullable();
            $table->char('in_07',2)->nullable();
            $table->char('in_08',2)->nullable();
            $table->char('in_09',2)->nullable();
            $table->char('in_10',2)->nullable();
            $table->char('in_11',2)->nullable();
            $table->char('in_12',2)->nullable();
            $table->char('in_13',2)->nullable();
            $table->char('in_14',2)->nullable();
            $table->char('in_15',2)->nullable();
            $table->char('in_16',2)->nullable();
            $table->char('in_17',2)->nullable();
            $table->char('in_18',2)->nullable();
            $table->char('in_19',2)->nullable();
            $table->char('in_20',2)->nullable();
            $table->char('logro_01',2)->nullable();
            $table->char('logro_02',2)->nullable();
            $table->char('logro_03',2)->nullable();
            $table->char('logro_04',2)->nullable();
            $table->char('promedio_logro',2)->nullable();
            $table->char('ac_01',2)->nullable();
            $table->char('ac_02',2)->nullable();
            $table->char('ac_03',2)->nullable();
            $table->char('ac_04',2)->nullable();
            $table->char('ac_05',2)->nullable();
            $table->char('promedio_actitud',2)->nullable();
            $table->char('pc01',2)->nullable();
            $table->char('pc02',2)->nullable();
            $table->char('pc03',2)->nullable();
            $table->char('pc04',2)->nullable();
            $table->char('pc05',2)->nullable();
            $table->char('pc06',2)->nullable();
            $table->char('pc07',3)->nullable();
            $table->char('pc08',3)->nullable();
            $table->char('pc09',3)->nullable();
            $table->char('pc10',3)->nullable();
            $table->char('pc11',3)->nullable();
            $table->char('pc12',3)->nullable();
            $table->char('ppc',2)->nullable();
            $table->char('evaluacion_trimestral',2)->nullable();
            $table->char('promedio_trimestral',2)->nullable();
            $table->char('comportamiento',2)->nullable();
            $table->char('p_t_1',2)->nullable();
            $table->char('p_t_2',2)->nullable();
            $table->char('p_t_3',2)->nullable();
            $table->char('calificacion_final_area',2)->nullable();
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
        Schema::dropIfExists('registro');
    }
}
