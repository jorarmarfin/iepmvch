<?php

use App\Models\Alumno;
use App\Models\Catalogo;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => 'secret',
        'idrole' => $faker->randomElement($array = array (4,5,6)),
        'foto'=> 'nofoto.jpg',
        'activo' => true,
        'remember_token' => str_random(10),
    ];
});

$factory->define(Alumno::class, function (Faker\Generator $faker) {
	$ubigeo = Catalogo::select('id')->Table('UBIGEO')->get()->implode('id',',');
	$sexo = Catalogo::select('id')->Table('SEXO')->get()->implode('id',',');
	$estado = Catalogo::Table('ESTADO ALUMNO')
						->where('id','<>',EstadoId('ESTADO ALUMNO','Matriculado'))
						->get()->implode('id',',');
	$ubigeo = explode(',', $ubigeo);
	$sexo = explode(',', $sexo);
	$estado = explode(',', $estado);

    return [
        'paterno' => $faker->firstName,
        'materno' => $faker->lastName,
        'nombres' => $faker->name,
        'dni' => $faker->unique()->randomNumber($nbDigits = 8),
        'idgrado' => $faker->numberBetween($min = 1, $max = 16),
        'fechanacimiento' => $faker->dateTime($max = 'now'),
        'idpais' => EstadoId('PAIS','PERÚ'),
        'religion' => $faker->randomElement($array = array ('Católico','Cristiano','Adventista','Otro'), $count = 1),
        'bautismo' => $faker->boolean,
        'comunion' => $faker->boolean,
        'confirmacion' => $faker->boolean,
        'idubigeo' => $faker->randomElement($array = $ubigeo, $count = 1),
        'direccion' => $faker->address,
        'telefonos' => $faker->tollFreePhoneNumber,
        'telefonoemergencia1' => $faker->tollFreePhoneNumber,
        'telefonoemergencia2' => $faker->tollFreePhoneNumber,
        'responsableeconomico'=> $faker->randomElement($array = array ('padre','madre','apoderado'), $count = 1),
        'esespecial' => false,
        'idestado' => $faker->randomElement($array = $estado, $count = 1),
        'idsexo' => $faker->randomElement($array = $sexo, $count = 1),
    ];
});



