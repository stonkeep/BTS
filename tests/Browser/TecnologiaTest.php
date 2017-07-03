<?php

namespace Tests\Browser;

use App\Regioes;
use App\User;
use Faker\Generator;
use Tests\Browser\Pages\Login;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestsUtil;
use Faker\Factory as Faker;

class TecnologiaTest extends DuskTestCase
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
            $browser->visit(new Login)
                ->realizaLogin()
//                ->assertPathIs('/admin')
                ->visit('http://127.0.0.1:8000/admin/tecnologias/insert')

                ->type('titulo', 'Tecnologia 2')
                ->radio('fimLucrativo', '0')
                ->type('tempoImplantacao', 2)
                ->radio('emAtividade', '0')
                ->radio('inscricaoAnterior', '0')
                ->radio('investimentoFBB', '0')
                ->select('categoria_id')
                ->type('resumo', $faker->text($maxNbChars = 100))
                ->select('tema_id')
                ->pause(1000)
                //->select('subtema1')

                //Seleciona Subtema principal
                ->click('div[name=subtema1]')
                ->with('div[name=subtema1]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->select('temaSecundario_id')
                //->select('subtema2')

                //Seleciona Subtema principal
                ->click('div[id=subtema2]')
                ->with('div[id=subtema2]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->type('problema', $faker->text($maxNbChars = 100))
                ->type('objetivoGeral', $faker->text($maxNbChars = 100))
                ->type('objetivoEspecifico', $faker->text($maxNbChars = 100))
                ->type('descricao', $faker->text($maxNbChars = 100))
                ->type('resultadosAlcancados', $faker->text($maxNbChars = 100))
                ->type('recursosHumanos', $faker->text($maxNbChars = 100))
                ->type('recursosMateriais', $faker->text($maxNbChars = 100))
                ->type('valorEstimado', $faker->text($maxNbChars = 100))
                ->type('valorHumanos', $faker->text($maxNbChars = 100))
                ->type('depoimentoLivre', $faker->text($maxNbChars = 100))
                ->type('nome', $faker->name)
                ->type('telefone', 6199999999)
                ->type('email', $faker->safeEmail)
                ->radio('ativo', 1)
                ->select('UF')
                ->type('cidade', $faker->city)
                ->keys('#dataImplantacao','01012017')
                ->type('bairro', $faker->streetName)

                //Seleciona Publico alvoprincipal
                ->click('div[name=PublicosAlvo]')
                ->with('div[name=PublicosAlvo]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->type('instituicaoNome', $faker->company)
                ->type('atuacao', $faker->text($maxNbChars = 50))
                ->type('enderecoEletronico', $faker->url)
//                ->value('enderecoEletronico', 'www.google.com.br')
                ->click('button[name=enviar]')
                ->pause(5000)


                //verifica se foi gravado mesmo
                ->visit('http://127.0.0.1:8000/admin/tecnologias/')
                ->type('input[placeholder="Pesquisar"]', 'Tecnologia 2')
                ->keys('input[placeholder="Pesquisar"]', ['{enter}', ''])
                ->waitForText('Tecnologia 2', 5)
                ->assertSee('Tecnologia 2');
        });
    }


    /**
     * @return void
     * @test
     */
    public function editTecnologia()
    {
        $this->geraUsuario();
        $faker = Faker::create();

        $this->browse(function ($browser) use ($faker) {

            //realiza login
            $browser->visit(new Login)
                ->realizaLogin()
                ->visit('http://127.0.0.1:8000/admin/tecnologias/')
                ->type('input[placeholder="Pesquisar"]', 'Tecnologia 2')
                ->keys('input[placeholder="Pesquisar"]', ['{enter}', ''])
                ->waitForText('Tecnologia 2', 5)
                ->assertSee('Tecnologia 2')
                ->click('.btn-success')
                ->pause(1000)
                ->clear('titulo')
                ->type('titulo', '3')
                ->driver->executeScript('window.scrollTo(0, 2000);');
                $browser->click('button[name=enviar]')
                ->pause(3000)
                ->visit('http://127.0.0.1:8000/admin/tecnologias/')
                ->type('input[placeholder="Pesquisar"]', 'Tecnologia 23')
                ->keys('input[placeholder="Pesquisar"]', ['{enter}', ''])
                ->waitForText('Tecnologia 2', 5)
                ->assertSee('Tecnologia 23');
        });
    }

    /**
     * @return void
     * @test
     */
    public function deletaTecnologia()
    {
        $this->geraUsuario();
        $faker = Faker::create();

        $this->browse(function ($browser) use ($faker) {

            //realiza login
            $browser->visit(new Login)
                ->realizaLogin()
                ->visit('http://127.0.0.1:8000/admin/tecnologias/')
                ->type('input[placeholder="Pesquisar"]', 'Tecnologia 23')
                ->keys('input[placeholder="Pesquisar"]', ['{enter}', ''])
                ->waitForText('Tecnologia 2', 5)
                ->assertSee('Tecnologia 23')
                ->click('.btn-danger')
                ->pause(1000)
                ->type('input[placeholder="Pesquisar"]', 'Tecnologia 23')
                ->keys('input[placeholder="Pesquisar"]', ['{enter}', ''])
                ->pause(3000)
                ->assertDontSee('Tecnologia 23');
        });
    }

}
