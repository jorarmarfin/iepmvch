<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\Models\Asignatura;
class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$area = Catalogo::where('idtable',25)->where('codigo','MAT')->first();
        Asignatura::create(['nombre' => 'Matematica','idarea' => $area->id]);
        Asignatura::create(['nombre' => 'Raz. Matematico','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','COM')->first();
        Asignatura::create(['nombre' => 'Comunicacion','idarea' => $area->id]);
        Asignatura::create(['nombre' => 'Raz. Verbal','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','AYC')->first();
        Asignatura::create(['nombre' => 'Arte','idarea' => $area->id]);
        Asignatura::create(['nombre' => 'Cultura','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','CYT')->first();
        Asignatura::create(['nombre' => 'Biologia','idarea' => $area->id]);
        Asignatura::create(['nombre' => 'Quimica','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','ING')->first();
        Asignatura::create(['nombre' => 'Ingles','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','CSO')->first();
        Asignatura::create(['nombre' => 'Ciencias Sociales','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','DPCC')->first();
        Asignatura::create(['nombre' => 'DPCC','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','EDF')->first();
        Asignatura::create(['nombre' => 'Edu. Fisica','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','EDR')->first();
        Asignatura::create(['nombre' => 'Edu. Religiosa','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','INF')->first();
        Asignatura::create(['nombre' => 'Informatica','idarea' => $area->id]);

        $area = Catalogo::where('idtable',25)->where('codigo','TOE')->first();
        Asignatura::create(['nombre' => 'Tutoria TOE','idarea' => $area->id]);
    }
}
