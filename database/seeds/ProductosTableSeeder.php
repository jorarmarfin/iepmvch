<?php

use App\Models\Catalogo;
use App\Models\Producto;
use Illuminate\Database\Seeder;
class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $um = Catalogo::where('idtable',21)->where('codigo','NIU')->first();
        Producto::create(['nombre'=>'Pension Inicial', 'idum'=>$um->id,'precio'=>300.0]);
        Producto::create(['nombre'=>'Pension Primaria', 'idum'=>$um->id,'precio'=>320.0]);
        Producto::create(['nombre'=>'Pension Secundaria', 'idum'=>$um->id,'precio'=>320.0]);
        Producto::create(['nombre'=>'Matricula', 'idum'=>$um->id,'precio'=>300.0]);
        Producto::create(['nombre'=>'Certificado Estudios', 'idum'=>$um->id,'precio'=>20.0]);
        Producto::create(['nombre'=>'Constancias', 'idum'=>$um->id,'precio'=>20.0]);
        Producto::create(['nombre'=>'Examen de subsanacion', 'idum'=>$um->id,'precio'=>30.0]);
        Producto::create(['nombre'=>'Copia de libreta', 'idum'=>$um->id,'precio'=>50.0]);
        Producto::create(['nombre'=>'Copia de agenda', 'idum'=>$um->id,'precio'=>10.0]);
        Producto::create(['nombre'=>'Mora', 'idum'=>$um->id,'precio'=>0.5]);

    }
}
