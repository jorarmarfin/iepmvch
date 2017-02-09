<?php

use App\Models\AreaAcademica;
use App\Models\Asignatura;
use Illuminate\Database\Seeder;
class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$area = AreaAcademica::where('codigo','MAT')->first();
        Asignatura::create(['nombre' => 'Matematica','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Raz. Matematico','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','COM')->first();
        Asignatura::create(['nombre' => 'Comunicacion','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Raz. Verbal','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','ART')->first();
        Asignatura::create(['nombre' => 'Arte','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Cultura','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','CYA')->first();
        Asignatura::create(['nombre' => 'CTA','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Ciencia y Tecnología','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Ciencia y ambiente','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','ING')->first();
        Asignatura::create(['nombre' => 'Ingles','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','PSO')->first();
        Asignatura::create(['nombre' => 'Personal Social','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'PFRH','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','ERE')->first();
        Asignatura::create(['nombre' => 'Edu. Religiosa','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','EFI')->first();
        Asignatura::create(['nombre' => 'Edu. Fisica','idareaacademica' => $area->id]);
        Asignatura::create(['nombre' => 'Motricidad','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','INF')->first();
        Asignatura::create(['nombre' => 'Informática','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','HIS')->first();
        Asignatura::create(['nombre' => 'HGE','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','FOR')->first();
        Asignatura::create(['nombre' => 'FCC','idareaacademica' => $area->id]);

        $area = AreaAcademica::where('codigo','TUT')->first();
        Asignatura::create(['nombre' => 'Tutoria TOE','idareaacademica' => $area->id]);
    }
}
