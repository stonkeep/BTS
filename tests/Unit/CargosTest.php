<?php

namespace Tests\Unit;

use App\Cargos;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CargosTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_criar_cargo()
    {
        Cargos::create([
            'descricao' => 'Técnico',
        ]);

        $cargo = Cargos::firstOrFail();

        $this->assertEquals('Técnico', $cargo->descricao);
    }

    /** @test */
    function testa_criacao_de_cago_por_post()
    {
        $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $cargos = Cargos::firstOrFail();

        $this->assertEquals('Técnico', $cargos->descricao);
    }

    //TODO criar teste de READ com list
    /** @test */
    function teste_se_consegue_ler_uma_lista_de_cargos()
    {
        $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $this->json('POST', "cargos/create", [
            'descricao' => 'Vice-Presidente',
        ]);
    }
    //TODO criar teste de UPDATE
    //TODO criar teste de DELETE
}
