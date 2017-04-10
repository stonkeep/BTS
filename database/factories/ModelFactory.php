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
use App\Cargos;
use App\NaturezasJuridicas;
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
        'edicao' => Carbon::now()->year,
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

    factory(NaturezasJuridicas::class)->create();
    factory(Cargos::class)->create();

    return [
        'CNPJ' => 16286169000190,
        'razaoSocial' => 'Teste de Instituicao',
        'naturezaJuridica' => 1,
        'nomeDaArea' => 'nao sei',
        'ddd' => 061,
        'telefone' => 231546,
        'email' => 'mateusgalasso@yahoo.com.br',
        'UF' => 'DF',
        'cidade' => 'Brasilia',
        'endereco' => 'Quadra 107',
        'bairro' => 'Aguas Claras',
        'CEP' => 71920700,
        'site' => 'fbb.org.br',
        'nomeCompleto' => 'Mateus Galasso',
        'cargo_id' => 1,
        'sexo' => 'M',
        'CPF' => 83745617509,
    ];
});

$factory->define(App\NaturezasJuridicas::class, function (Faker\Generator $faker) {
    return [
        'descricao' => 'Empresário(individual)'
    ];
});

$factory->define(App\Cargos::class, function (Faker\Generator $faker) {
    return ['descricao' => 'Técnico', 'descricao' => 'Empresário(individual)'];
});