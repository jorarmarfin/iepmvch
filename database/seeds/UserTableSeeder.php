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
            'menu' => 'menu.sider-admin',
            ]);
        User::create([
            'name' => 'Rosa Gutierres',
            'email' => 'rgutierres@iepmvch.com',
            'password' => '321654987',
            'idrole' => $root->id,
            'menu' => 'menu.sider-admin',
            ]);
        //factory(App\User::class,20)->create();
    }
}
