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
        Institucion::create([
        	'nombre' => 'Milagrosa Virgen de Chapi',
        	'razonsocial' => 'MILAGROSA VIRGEN DE CHAPI S.R.L',
        	'resolucion' => 'R.D.N° 03964 - UGEL 05 - S.J.L.',
        	'direccion' => 'Av. Los Tusilagos (Oeste) N° 202 - 204 Urbanizacion Los jardines de San Juan - S.J.L','idubigeo' => 0,
        	'director' => 'GUTIERREZ TRUJILLO SATURNINO EDUARDO',
        	'telefonos' => '458-5946',
        	'email'=>'colegio@colegio.com',
            'web'=>'www.iepmvch.com'
            'ruc'=>'20600162773'
            'serie'=>'FA14'
            'inicio'=>'100'
        	'fin'=>'2000'
        	]);
    }
}
