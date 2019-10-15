<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Departamento::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
    ];
});

$factory->define(\App\Funcionario::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
	'departamento_id' => $faker->numberBetween(1,3),
    ];
});

$factory->define(\App\Mensagem::class, function (Faker $faker) {

    $id1 = $faker->numberBetween(1,10);
    do {
	$id2 = $faker->numberBetween(1,10);
    } while ($id1 == $id2);

    return [
        'titulo' => $faker->sentence,
	'texto' => $faker->text(200),
	'funcionario_id' => $id1,
	'destinatario_id' => $id2,
    ];
});



