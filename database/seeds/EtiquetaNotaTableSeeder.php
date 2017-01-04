<?php

use Illuminate\Database\Seeder;
use App\Models\EtiquetaNota;
use App\Models\Catalogo;
class EtiquetaNotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nivel = Catalogo::where('idtable',4)->where('codigo','INI')->first();
        EtiquetaNota::create(['nombre' => 'C','rango' => '0;10','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'B','rango' => '11;14','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'A','rango' => '15;20','idnivel' => $nivel->id]);
        $nivel = Catalogo::where('idtable',4)->where('codigo','PRI')->first();
        EtiquetaNota::create(['nombre' => 'C','rango' => '0;10','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'B','rango' => '11;12','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'A','rango' => '13;16','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'AD','rango' => '17;20','idnivel' => $nivel->id]);
        $nivel = Catalogo::where('idtable',4)->where('codigo','SEC')->first();
        EtiquetaNota::create(['nombre' => 'C','rango' => '0;10','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'B','rango' => '11;12','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'A','rango' => '13;16','idnivel' => $nivel->id]);
        EtiquetaNota::create(['nombre' => 'AD','rango' => '17;20','idnivel' => $nivel->id]);
    }
}
