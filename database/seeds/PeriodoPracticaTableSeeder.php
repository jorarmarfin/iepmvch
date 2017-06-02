<?php

use App\Models\AreaAcademica;
use App\Models\PeriodoPractica;
use Illuminate\Database\Seeder;

class PeriodoPracticaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeriodoPractica::create([
            'idperiodoacademico' => EstadoId('PERIODO ACADEMICO','1er Trimestre'),
            'pc01' => false,
            'pc02' => false,
            'pc03' => false,
            'pc04' => false,
            'pc05' => false,
            'pc06' => false,
            'pc07' => false,
            'pc08' => false,
            'pc09' => false,
            'pc10' => false
            ]);
        PeriodoPractica::create([
            'idperiodoacademico' => EstadoId('PERIODO ACADEMICO','2do Trimestre'),
            'pc01' => false,
            'pc02' => false,
            'pc03' => false,
            'pc04' => false,
            'pc05' => false,
            'pc06' => false,
            'pc07' => false,
            'pc08' => false,
            'pc09' => false,
            'pc10' => false
            ]);
        PeriodoPractica::create([
            'idperiodoacademico' => EstadoId('PERIODO ACADEMICO','3er Trimestre'),
            'pc01' => false,
            'pc02' => false,
            'pc03' => false,
            'pc04' => false,
            'pc05' => false,
            'pc06' => false,
            'pc07' => false,
            'pc08' => false,
            'pc09' => false,
            'pc10' => false
            ]);
    }
}
