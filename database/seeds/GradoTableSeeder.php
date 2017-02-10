<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\Models\Grado;

class GradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel = Catalogo::where('idtable',4)->where('codigo','INI')->first();
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'I','codigo' => '1 años','nombre' => 'Inicial 1 años','activo' => false]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'I','codigo' => 'CONDICION LIBRE','nombre' => 'CONDICION LIBRE','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'II','codigo' => '3 años','nombre' => 'Inicial 3 años','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'II','codigo' => '4 años','nombre' => 'Inicial 4 años','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'II','codigo' => '5 años','nombre' => 'Inicial 5 años','activo' => true]);

    	$nivel = Catalogo::where('idtable',4)->where('codigo','PRI')->first();
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'III','codigo' => 'Primero','nombre' => 'Primer Grado','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'III','codigo' => 'Segundo','nombre' => 'Segundo Grado','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'IV','codigo' => 'Tercero','nombre' => 'Tercer Grado','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'IV','codigo' => 'Cuarto','nombre' => 'Cuarto Grado','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'V','codigo' => 'Quinto','nombre' => 'Quinto Grado','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'V','codigo' => 'Sexto','nombre' => 'Sexto Grado','activo' => true]);

        $nivel = Catalogo::where('idtable',4)->where('codigo','SEC')->first();
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'VI','codigo' => 'Primero','nombre' => 'Primer Año','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'VI','codigo' => 'Segundo','nombre' => 'Segundo Año','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'VII','codigo' => 'Tercero','nombre' => 'Tercer Año','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'VII','codigo' => 'Cuarto','nombre' => 'Cuarto Año','activo' => true]);
        Grado::create(['idnivel' => $nivel->id,'ciclo' => 'VII','codigo' => 'Quinto','nombre' => 'Quinto Año','activo' => true]);

    }
}
