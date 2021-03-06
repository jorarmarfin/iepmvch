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
        $this->call(GradoSeccionTableSeeder::class);
        $this->call(InstitucionTableSeeder::class);
        #$this->call(AreaAcademicaTableSeeder::class);
        #$this->call(AsignaturaTableSeeder::class);
        $this->call(EtiquetaNotaTableSeeder::class);
        $this->call(EtiquetaNotaDetalleTableSeeder::class);
        $this->call(PensionTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(SerieTableSeeder::class);
        $this->call(AlumnosTableSeeder::class);
        $this->call(AreaAcademicaTableSeeder::class);

        Model::reguard();
    }
}
