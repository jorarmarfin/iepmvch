<?php

use Illuminate\Database\Seeder;
use App\Models\Institucion;

class InstitucionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institucion::create(['nombre' => 'Milagrosa Virgen de Chapi','direccion' => 'AVENIDA LOS TUSILAGOS 202','idubigeo' => 0,'director' => 'GUTIERREZ TRUJILLO SATURNINO EDUARDO','telefonos' => '99xxx','email'=>'colegio@colegio.com','web'=>'www.iepmvch.com']);
    }
}
