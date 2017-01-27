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
            'name' => 'Rosa Gutierrez',
            'email' => 'rgutierrez@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-admin',
            ]);
        User::create([
            'name' => 'Yenny Gutierrez',
            'email' => 'ygutierrez@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-admin',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','doc')->first();
    }
}
