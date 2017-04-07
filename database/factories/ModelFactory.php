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
    return [
        'edicao' =>  Carbon::now()->year,
        'data_abertura' => Carbon::now()->toDateTimeString(),
        'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
        'encerrado' => false
    ];
});

$factory->define(App\Temas::class, function (Faker\Generator $faker) {
    return [
        'nome' => 'Alimentação',
    ];
});


$factory->define(App\Regioes::class, function (Faker\Generator $faker) {
    return [
        'sigla' => 'CO',
        'descricao' => 'Centro - Oeste'
    ];
});

$factory->define(App\Instituicao::class, function (Faker\Generator $faker) {
    return [
        'CNPJ' => '01612089000100',
        'razaoSocial' => 'PREFEITURA DO MUNICIPIO DE TANGUA',
        'naturezas_juridicas_id' => '1',
        'nomeDaArea' => 'SECRETARIA MUNICIPAL DE AGRICULTURA',
        'ddd' => '',
        'telefone' => '',
        'emai' => '',
        'UF' => '',
        'cidade' => '',
        'endereco' => '',
        'bairro' => '',
        'CEP' => '',
        'site' => '',
        'nomeCompleto' => '',
        'cargos_id' => '',
        'sexo' => '',
        'CPF' => '',
    ];
});