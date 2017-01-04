<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\Models\Pension;
class PensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel = Catalogo::where('idtable',4)->where('codigo','INI')->first();
        Pension::create(['idnivel' => $nivel->id,'monto' => 300,'activo' => true]);

        $nivel = Catalogo::where('idtable',4)->where('codigo','PRI')->first();
        Pension::create(['idnivel' => $nivel->id,'monto' => 320,'activo' => true]);

        $nivel = Catalogo::where('idtable',4)->where('codigo','SEC')->first();
        Pension::create(['idnivel' => $nivel->id,'monto' => 320,'activo' => true]);

    }
}
