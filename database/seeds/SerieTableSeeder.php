<?php

use App\Models\Serie;
use Illuminate\Database\Seeder;

class SerieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::create(['nombre' => 'boleta','prefijo' => 'B','serie' => 1,'numero'=>1]);
        Serie::create(['nombre' => 'recibo','prefijo' => 'R','serie' => 1,'numero'=>1]);
    }
}
