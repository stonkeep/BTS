<?php

namespace Tests\Unit;

use App\Instituicao;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class UserTest extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;


    /**
     * A basic test example.
     * @return void
     */
    public function teste_vincula_instituicao_e_usuario()
    {
        factory(User::class)->create();
        $user = User::first();
        factory(Instituicao::class)->create([
            'razaoSocial' => 'Teste de Instituicao'
        ]);
        $instituicao = Instituicao::first();
        //$user->instituicoes()->save($instituicao);
        $user->instituicoes()->attach($instituicao);

        $this->assertEquals($user->instituicoes()->first()->razaoSocial, 'Teste de Instituicao' );
    }
}

