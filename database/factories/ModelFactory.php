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
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\VigenciasPremio::class, function (Faker\Generator $faker) {
    return [
        'edicao'            => Carbon::now()->year,
        'data_abertura'     => Carbon::now()->toDateTimeString(),
        'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
        'encerrado'         => false
    ];
});

$factory->define(App\Temas::class, function (Faker\Generator $faker) {
    return [
        'nome' => 'Alimentação',
    ];
});

$factory->define(App\InstituicaoParceira::class, function (Faker\Generator $faker) {
    return [
        'nome'    => 'Universidade Federal do Paraná UFPR',
        'tecnologia_id'    => 1,
        'atuacao' => ' A parceria acontece desde 2004, com o Centro de Estudos em Segurança Pública e Direitos Humanos. Esta entidade, por meio de seu responsável, Prof. Dr. Pedro Rodolfo Bodê de Moraes apoia os trabalhos de intervenção realizados. Além de compartilhar conhecimentos, é por intermédio desta parceria que os cursos ofertados aos educadores de suas escolas parceiras são chancelados como cursos de extensão da UFPR e seus participantes são devidamente certificados.',
    ];
});

$factory->define(App\Regioes::class, function (Faker\Generator $faker) {
    return [
        'sigla'     => 'CO',
        'descricao' => 'Centro - Oeste'
    ];
});

$factory->define(App\Instituicao::class, function (Faker\Generator $faker) {

    factory(NaturezasJuridicas::class)->create();
    factory(Cargos::class)->create();

    return [
        'CNPJ'             => $faker->shuffle('46723520000123'),
        'razaoSocial'      => $faker->company,
        'naturezaJuridica' => rand(1, 39),
        'nomeDaArea'       => $faker->sentence,
        'ddd'              => 61,
        'telefone'         => $faker->randomNumber(9),
        'email'            => $faker->unique()->safeEmail,
        'UF'               => 'DF',
        'cidade'           => $faker->city,
        'endereco'         => $faker->streetAddress,
        'bairro'           => $faker->streetName,
        'CEP'              => $faker->randomNumber(8),
        'site'             => $faker->url,
        'nomeCompleto'     => $faker->name,
        'cargo_id'         => rand(1,25),
        'sexo'             => $faker->randomElement(($array = array ('M','F'))),
        'CPF'              => $faker->shuffle('35753747833'),
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

$factory->define(App\Tecnologia::class, function (Faker\Generator $faker) {
    return [
        'numeroInscricao'      => '2017/',
        'titulo'               => $faker->sentence(6),
        'fimLucrativo'         => $faker->boolean,
        'tempoImplantacao'     => rand(1,5),
        'emAtividade'          => $faker->boolean,
        'inscricaoAnterior'    => $faker->boolean,
        'investimentoFBB'      => $faker->boolean,
        'categoria_id'         => rand(1,6),
        'resumo'               => $faker->text,
        'tema_id'              => 1,
        'temaSecundario_id'    => 2,
        'problema'             => $faker->text,
        'objetivoGeral'        => $faker->text,
        'objetivoEspecifico'   => $faker->text,
        'descricao'            => $faker->text,
        'resultadosAlcancados' => $faker->text,
        'recursosMateriais'    => $faker->text,
        'recursosHumanos'      => $faker->text,
        'valorEstimado'        => $faker->text,
        'valorHumanos'         => $faker->text,
        'depoimentoLivre'      => $faker->text,
        'instituicao_id'      => 1,
    ];
});

$factory->define(App\LocalImplantacao::class, function (Faker\Generator $faker) {
 
    return [
        'ativo' => true, 
        'uf_id' => 1,
        'cidade' => 'Taguatinga',
        'bairro' => 'norte',
        'dataImplantacao' => Carbon::today()->format('d-m-Y'),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'author_id' => 1,
        'title' => 'Teste 1',
        'body' =>  'TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE ',
        'slug' => 'teste-1',
        'categoria_id' => 1,
        'active' => true,
    ];
});

$factory->define(App\PostCategoria::class, function (Faker\Generator $faker) {
    return [
        'descricao' => 'Notícias'
    ];
});

