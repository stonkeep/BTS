<?php

namespace Tests\Browser;

use App\Regioes;
use App\User;
use Faker\Generator;
use function foo\func;
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

        $this->browse(function ($browser) use ($faker, $user) {
            $browser
                //->loginAs($user)
                ->visit('http://127.0.0.1:8000/login')
                ->type('email', 'admin@admin.com.br')
                ->type('password', '123456')
                ->press('Assinar')
                ->assertPathIs('/admin')
                ->pause(1000)
                ->visit('http://127.0.0.1:8000/admin/instituicoes/create')

                ->click('div[name=naturezaJuridica]')
                ->with('div[name=naturezaJuridica]', function ($multi){
                    $multi->click('.multiselect__option--highlight');
                })

                ->type('CNPJ', $faker->shuffle('46723520000123'))
                ->type('razaoSocial', $faker->company)
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

                ->type('sexo'            , $faker->randomElement(($array = array ('M','F'))))
                ->type('CPF'             , $faker->shuffle('35753747833'))
                ->click('button[name=enviar]');
        });
    }


}
