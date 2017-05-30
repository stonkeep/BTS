<?php

namespace Tests\Unit;

use App\NaturezasJuridicas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class NaturezaJuridica extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;


    private function criaListaDeNaturezas()
    {
        $this->json('POST', "/admin/naturezasJuridicas/create", [
            'descricao'  => 'Autarquia Federal',
            'created_at' => '2017-03-31 19:27:54',
            'updated_at' => '2017-03-31 19:27:55'
        ]);

        $this->json('POST', "/admin/naturezasJuridicas/create", [
            'descricao'  => 'Autarquia Estadual',
            'created_at' => '2017-03-31 19:37:54',
            'updated_at' => '2017-03-31 19:47:55'
        ]);
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function testExample()
    {
        NaturezasJuridicas::create([
            'descricao' => 'Empresário(individual)'
        ]);

        $natureza = NaturezasJuridicas::firstOrFail();

        $this->assertEquals('Empresário(individual)', $natureza->descricao);
    }


    /** @test */
    function testa_se_consegue_gravar_por_post()
    {
        $this->json('POST', "/admin/naturezasJuridicas/create", [
            'descricao' => 'Autarquia Estadual'
        ]);

        $natureza = NaturezasJuridicas::firstOrFail();

        $this->assertEquals('Autarquia Estadual', $natureza->descricao);
    }


    /** @test */
    function testa_o_retorno_de_lista_da_gravacao_por_post()
    {
        //$this->disableExceptionHandling();

        $this->criaListaDeNaturezas();

        //carrega dados repetidos para testar a validação
        $this->response = $this->json('POST', "/admin/naturezasJuridicas/create", [
            'descricao'  => 'Autarquia Federal',
            'created_at' => '2017-03-31 19:27:54',
            'updated_at' => '2017-03-31 19:27:55'
        ]);

        $this->assertValidationError('descricao');

        $response = $this->get("admin/naturezasJuridicas");

        $response->assertStatus(200);

        $response->assertSee('Autarquia Federal');
        $response->assertSee('Autarquia Estadual');
        $response->assertSee('1');
        $response->assertSee('2');
        $response->assertSee('2017-03-31 19:27:54');
        $response->assertSee('2017-03-31 19:37:54');
        $response->assertSee('2017-03-31 19:27:55');
        $response->assertSee('2017-03-31 19:47:55');
    }

    /** @test */
    function testa_delecao()
    {
        $this->criaListaDeNaturezas();

        $natureza = NaturezasJuridicas::findOrFail(1);

        //dd($natureza);
        $response = $this->get("admin/naturezasJuridicas/delete/{$natureza->id}");

        $response->assertStatus(200);
        $response->assertSee('Autarquia Estadual');
        $response->assertDontSee('Autarquia Federal');
    }

    /** @test */
    function teste_de_update()
    {
        $this->disableExceptionHandling();
        $this->criaListaDeNaturezas();

        $natureza = NaturezasJuridicas::findOrFAil(1);

        //$natureza->descricao = 'Outro teste';

        $response = $this->json('PUT', "admin/naturezasJuridicas/update/{$natureza->id}", [ 'descricao'  => 'Autarquia Estadual2']);

        //dd($response);
        $response->assertStatus(200);
        $response->assertDontSee('Autarquia Federal');
        $response->assertSee('Autarquia Estadual2');

    }
}
