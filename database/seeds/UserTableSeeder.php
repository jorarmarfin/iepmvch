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
            'username' => 'pece',
            'name' => 'Luis Fernando',
            'email' => 'luis.mayta@gmail.com',
            'password' => '321654987',
            'idrole' => $root->id,
            'menu' => 'menu.sider-root',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','adm')->first();
        User::create([
            'username' => '43703194',
            'name' => 'Rosa Gutierrez',
            'email' => 'rgutierrez@iepmvch.com',
            'password' => '43703194',
            'idrole' => $role->id,
            'menu' => 'menu.sider-admin',
            ]);
        User::create([
            'username' => 'vivianne',
            'name' => 'Yenny Gutierrez',
            'email' => 'ygutierrez@iepmvch.com',
            'password' => '321654987',
            'idrole' => $role->id,
            'menu' => 'menu.sider-admin',
            ]);
        $role = Catalogo::where('idtable',1)->where('codigo','doc')->first();
    }
}
