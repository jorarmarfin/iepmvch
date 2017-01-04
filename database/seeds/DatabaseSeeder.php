<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CatalogoTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(GradoTableSeeder::class);
        $this->call(InstitucionTableSeeder::class);
        $this->call(AsignaturaTableSeeder::class);
        $this->call(EtiquetaNotaTableSeeder::class);
        $this->call(EtiquetaNotaDetalleTableSeeder::class);
        $this->call(PensionTableSeeder::class);

        Model::reguard();
    }
}
