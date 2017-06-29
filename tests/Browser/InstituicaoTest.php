<?php

namespace Tests\Browser;

use App\Regioes;
use App\User;
use Faker\Generator;
use function foo\func;
use function PHPSTORM_META\type;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestsUtil;
use Faker\Factory as Faker;

class InstituicaoTestTest extends DuskTestCase
{
    use DatabaseMigrations;
    use TestsUtil;


    /**
     * @return void
     */
    public function teste_insert()
    {
        $this->geraUsuario();
        $user = User::firstOrFail();
        $faker = Faker::create();
        $razaoSocial = 'cadastro automatizado1';

        $this->browse(function ($browser) use ($faker, $user, $razaoSocial) {
            $browser
                //Faz o login
                //TODO transformar o login em page
                ->visit('http://127.0.0.1:8000/login')
                ->type('email', 'admin@admin.com.br')
                ->type('password', '123456')
                ->press('Assinar')
                ->assertPathIs('/admin')
                ->pause(1000)


                //Abre a tela de cadastro de instituicao
                ->visit('http://127.0.0.1:8000/admin/instituicoes/create')
                ->click('div[name=naturezaJuridica]')
                ->with('div[name=naturezaJuridica]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->type('CNPJ', '81138095000106')
                ->type('razaoSocial', $razaoSocial)
                ->type('nomeDaArea'      , $faker->sentence)
                ->type('ddd'             , 61)
                ->type('telefone'        , $faker->randomNumber(9))
                ->type('input[name=email]' , $faker->unique()->safeEmail)
                ->select('UF')
                ->type('cidade'          , $faker->city)
                ->type('endereco'        , $faker->streetAddress)
                ->type('bairro'          , $faker->streetName)
                ->type('CEP'             , $faker->randomNumber(8))
                ->type('site'            , $faker->url)
                ->type('nomeCompleto'    , $faker->name)


                ->click('div[name=cargo_id]')
                ->with('div[name=cargo_id]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->select('sexo', 'M')
                ->type('CPF', '75238385293')

                //desce a tela para poder clicar no botão enviar
                ->driver->executeScript('window.scrollTo(0, 500);');

                //depois de executar o script não posso mais encadear comandos - logo tenho que instanciar de novo o browser
                $browser->click('button[name=enviar]')
                ->visit('http://127.0.0.1:8000/admin/instituicoes')
                ->type('input[placeholder="Pesquisar"]', substr($razaoSocial, 0, strpos($razaoSocial, " ")))
                ->assertSee($razaoSocial)

                //editao resgistro para fazer um próximo teste
                ->click('.btn-success')
                ->pause(1000)
                ->clear('razaoSocial')
                ->type('razaoSocial', '2')

                //desce a tela para poder clicar no botão enviar
                ->driver->executeScript('window.scrollTo(0, 500);');

                //depois de executar o script não posso mais encadear comandos - logo tenho que instanciar de novo o browser
                $browser->click('button[name=enviar]')
                ->visit('http://127.0.0.1:8000/admin/instituicoes')
                ->type('input[placeholder="Pesquisar"]', substr($razaoSocial, 0,strpos($razaoSocial, " ")))
                ->assertSee($razaoSocial . '2')

                //Apaga o resgistro para fazer um próximo teste
                ->click('.btn-danger')
                ->pause(1000)
                ->type('input[placeholder="Pesquisar"]', substr($razaoSocial, 0,strpos($razaoSocial, " ")))
                ->assertDontSee($razaoSocial . '2')
                    ;
        });
    }


}
