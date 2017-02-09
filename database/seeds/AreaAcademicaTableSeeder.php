<?php

use App\Models\AreaAcademica;
use Illuminate\Database\Seeder;

class AreaAcademicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaAcademica::create(['codigo' => 'MAT','inicial' => 'Matemática','primaria' => 'Matemática','secundaria' => 'Matemática']);
        AreaAcademica::create(['codigo' => 'COM','inicial' => 'Comunicacion','primaria' => 'Comunicacion','secundaria' => 'Comunicacion']);
        AreaAcademica::create(['codigo' => 'ART','inicial' => 'Arte','primaria' => 'Arte y Cultura','secundaria' => 'Arte']);
        AreaAcademica::create(['codigo' => 'ING','inicial' => 'Ingles','primaria' => 'Ingles','secundaria' => 'Ingles']);
        AreaAcademica::create(['codigo' => 'PSO','inicial' => 'Personal Social','primaria' => 'Personal Social','secundaria' => 'Persona Familia y Relaciones Humanas']);
        AreaAcademica::create(['codigo' => 'ERE','inicial' => 'Educ. Religiosa','primaria' => 'Educ. Religiosa','secundaria' => 'Educ. Religiosa']);
        AreaAcademica::create(['codigo' => 'CYA','inicial' => 'Ciencia y ambiente','primaria' => 'Ciencia y Tecnología','secundaria' => 'Ciencia, Tecnología y Ambiente']);
        AreaAcademica::create(['codigo' => 'INF','inicial' => 'Informática','primaria' => 'Informática','secundaria' => 'Ed. Para el Trabajo']);
        AreaAcademica::create(['codigo' => 'EFI','inicial' => 'Motricidad','primaria' => 'Educ. Física','secundaria' => 'Educ. Física']);
        AreaAcademica::create(['codigo' => 'TUT','inicial' => ' ','primaria' => 'Tutoria','secundaria' => 'Tutoría y Orientación Educativa']);
        AreaAcademica::create(['codigo' => 'HIS','inicial' => ' ','primaria' => ' ','secundaria' => 'Historia, Geografía y Economía']);
        AreaAcademica::create(['codigo' => 'FOR','inicial' => ' ','primaria' => ' ','secundaria' => 'Formación Ciudadana y Cívica']);
    }
}
