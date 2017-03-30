<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\VigenciasPremio::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'edicao' =>  Carbon::now()->year,
        'data_abertura' => Carbon::now()->toDateTimeString(),
        'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
        'encerrado' => false
    ];
});
