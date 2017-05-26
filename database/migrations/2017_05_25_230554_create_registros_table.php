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
            $table->integer('idasignaturagradoseccion')->nullable();
            $table->integer('idperiodoacademico')->nullable();
            $table->decimal('in_01',8,3)->nullable();
            $table->decimal('in_02',8,3)->nullable();
            $table->decimal('in_03',8,3)->nullable();
            $table->decimal('in_04',8,3)->nullable();
            $table->decimal('in_05',8,3)->nullable();
            $table->decimal('in_06',8,3)->nullable();
            $table->decimal('in_07',8,3)->nullable();
            $table->decimal('in_08',8,3)->nullable();
            $table->decimal('in_09',8,3)->nullable();
            $table->decimal('in_10',8,3)->nullable();
            $table->decimal('in_11',8,3)->nullable();
            $table->decimal('in_12',8,3)->nullable();
            $table->decimal('in_13',8,3)->nullable();
            $table->decimal('in_14',8,3)->nullable();
            $table->decimal('in_15',8,3)->nullable();
            $table->decimal('in_16',8,3)->nullable();
            $table->decimal('in_17',8,3)->nullable();
            $table->decimal('in_18',8,3)->nullable();
            $table->decimal('in_19',8,3)->nullable();
            $table->decimal('in_20',8,3)->nullable();
            $table->decimal('logro_01',8,3)->nullable();
            $table->decimal('logro_02',8,3)->nullable();
            $table->decimal('logro_03',8,3)->nullable();
            $table->decimal('logro_04',8,3)->nullable();
            $table->decimal('promedio_logro',8,3)->nullable();
            $table->decimal('ac_01',8,3)->nullable();
            $table->decimal('ac_02',8,3)->nullable();
            $table->decimal('ac_03',8,3)->nullable();
            $table->decimal('ac_04',8,3)->nullable();
            $table->decimal('ac_05',8,3)->nullable();
            $table->decimal('promedio_actitud',8,3)->nullable();
            $table->decimal('pc1_n',8,3)->nullable();
            $table->string('pc1_s',3)->nullable();
            $table->decimal('pc2_n',8,3)->nullable();
            $table->string('pc2_s',3)->nullable();
            $table->decimal('pc3_n',8,3)->nullable();
            $table->string('pc3_s',3)->nullable();
            $table->decimal('pc4_n',8,3)->nullable();
            $table->string('pc4_s',3)->nullable();
            $table->decimal('pc5_n',8,3)->nullable();
            $table->string('pc5_s',3)->nullable();
            $table->decimal('pc6_n',8,3)->nullable();
            $table->string('pc6_s',3)->nullable();
            $table->decimal('ppc',8,3)->nullable();
            $table->decimal('evaluacion_trimestral',8,3)->nullable();
            $table->decimal('promedio_trimestral',8,3)->nullable();
            $table->decimal('comportamiento',8,3)->nullable();
            $table->decimal('p_t_1',8,3)->nullable();
            $table->decimal('p_t_2',8,3)->nullable();
            $table->decimal('p_t_3',8,3)->nullable();
            $table->decimal('calificacion_final_area',8,3)->nullable();
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
