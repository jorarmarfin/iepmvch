<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogo;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Catalogo::idroot();
        User::create([
            'name' => 'Luis Fernando',
            'email' => 'luis.mayta@gmail.com',
            'password' => '321654987',
            'idrole' => $root->id,
            'menu' => 'menu.sider-root',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','adm')->first();
        User::create([
            'name' => 'Rosa Gutierres',
            'email' => 'rgutierrez@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-admin',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','doc')->first();
        User::create([
            'name' => 'Docente 1',
            'email' => 'docente@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-doc',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','pad')->first();
        User::create([
            'name' => 'Jose Luis Mayta',
            'email' => 'padre@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-pad',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','psi')->first();
        User::create([
            'name' => 'Yanet Caicho',
            'email' => 'psicologo@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-psi',
            ]);
        //factory(App\User::class,20)->create();
    }
}
