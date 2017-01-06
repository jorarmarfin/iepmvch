<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\Models\Grado;
use App\Models\GradoSeccion;
class GradoSeccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seccion = Catalogo::where('idtable',18)->where('codigo','A')->first();
        $grado = Grado::where('activo',true)->get();
        $grado = $grado->each(function($item,$key) use($seccion) {
        	GradoSeccion::create(['idgrado' => $item->id,'idseccion' => $seccion->id,'cantidad' => 16]);

        });

    }
}
