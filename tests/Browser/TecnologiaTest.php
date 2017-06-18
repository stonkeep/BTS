<?php

namespace Tests\Browser;

use App\Regioes;
use App\User;
use Faker\Generator;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestsUtil;
use Faker\Factory as Faker;

class RegioesTest extends DuskTestCase
{
    use DatabaseMigrations;
    use TestsUtil;


    /**
     * @return void
     */
    public function teste_insert()
    {
        $this->geraUsuario();
        $user = User::first();
        $faker = Faker::create();

        $this->browse(function ($browser) use ($faker, $user) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'mateusgalasso@yahoo.com.br')
                ->type('password', '123456')
                ->press('Assinar')
//                ->assertPathIs('/admin')
                ->pause(1000)
                ->visit('http://127.0.0.1:8000/admin/tecnologias/insert')
                ->type('titulo', 'Tecnologia 2')
                ->radio('fimLucrativo', '0')
                ->type('tempoImplantacao', 2)
                ->radio('emAtividade', '0')
                ->radio('inscricaoAnterior', '0')
                ->radio('investimentoFBB', '0')
                ->select('categoria_id')
                ->type('resumo', $faker->text($maxNbChars = 200))
                ->select('tema_id')
                ->select('subtema1')
                ->select('temaSecundario_id')
                ->select('subtema2')
                ->type('problema', $faker->text($maxNbChars = 200))
                ->type('objetivoGeral', $faker->text($maxNbChars = 200))
                ->type('objetivoEspecifico', $faker->text($maxNbChars = 200))
                ->type('descricao', $faker->text($maxNbChars = 200))
                ->type('resultadosAlcancados', $faker->text($maxNbChars = 200))
                ->type('recursosHumanos', $faker->text($maxNbChars = 200))
                ->type('recursosMateriais', $faker->text($maxNbChars = 200))
                ->type('valorEstimado', $faker->text($maxNbChars = 200))
                ->type('valorHumanos', $faker->text($maxNbChars = 200))
                ->type('depoimentoLivre', $faker->text($maxNbChars = 200))
                ->type('nome', $faker->name)
                ->type('telefone', 6199999999)
                ->type('email', $faker->email)
                ->radio('ativo', 1)
                ->select('UF')
                ->type('cidade', $faker->city)
                ->type('bairro', $faker->streetName)
                ->select('PublicosAlvo')
                ->type('instituicaoNome', $faker->company)
                ->type('atuacao', $faker->text($maxNbChars = 50))
                ->type('enderecoEletronico', 'www.google.com.br')
//                ->value('enderecoEletronico', 'www.google.com.br')
                ->press('enviar');
        });
    }


}
