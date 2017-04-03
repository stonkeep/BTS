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
        $response = $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $response->assertStatus(200);

        $response->assertSee('Técnico');
    }

    /** @test */
    function teste_se_consegue_ler_uma_lista_de_cargos()
    {
        //$this->disableExceptionHandling();

        $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $this->json('POST', "cargos/create", [
            'descricao' => 'Vice-Presidente',
        ]);

        $response = $this->get('/cargos');

        $response->assertStatus(200);

        $response->assertSee('Técnico');
        $response->assertSee('Vice-Presidente');

    }

    /** @test */
    function testa_delete_de_cargo()
    {
        //$this->disableExceptionHandling();

        $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $this->json('POST', "cargos/create", [
            'descricao' => 'Vice-Presidente',
        ]);

        $cargo = Cargos::findOrFail(1);

        $response = $this->json('DELETE',"cargos/delete/{$cargo->id}");

        $response->assertStatus(200);

        $response->assertSee('Vice-Presidente');
        $response->assertDontSee('Técnico');

    }


    /** @test */
    function testa_update_cargo()
    {
        $this->json('POST', "cargos/create", [
            'descricao' => 'Técnico',
        ]);

        $cargo = Cargos::findOrFail(1);

        $cargo->descricao = 'Outra descrição';

        $response = $this->json('PUT', "cargos/create/{$cargo}");

        $response->assertStatus(200);

        $response->assertDontSee('Técnico');
        $response->assertSee('Outra descrição');
    }
    //TODO testar validações
}
