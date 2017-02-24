<?php

use Illuminate\Database\Seeder;

class MatriculaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Matricula::class,100)->create();
    }
}
