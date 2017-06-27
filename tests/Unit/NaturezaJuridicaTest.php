<?php

namespace Tests\Unit;

use App\NaturezasJuridicas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestsUtil;
use Tests\ValidationsFields;

class NaturezaJuridica extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;
    use TestsUtil;
    
    public function setUp()
    {
        parent::setUp();

        $this->geraUsuario();
    }


    private function criaListaDeNaturezas()
    {
        $this->post("/admin/naturezasJuridicas/", [
            'descricao'  => 'Autarquia Federal',
        ]);

        $this->post("/admin/naturezasJuridicas/", [
            'descricao'  => 'Autarquia Estadual',
        ]);
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function test_create()
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
        $this->post("/admin/naturezasJuridicas/", [
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

        $this->response = $this->json('POST', '/admin/naturezasJuridicas/', NaturezasJuridicas::firstOrFail()->toArray());

        $this->assertValidationError('descricao');

        $response = $this->get("admin/naturezasJuridicas");

        $response->assertStatus(200);

        $response->assertSee('Autarquia Federal');
        $response->assertSee('Autarquia Estadual');
        $response->assertSee('1');
        $response->assertSee('2');
    }

    /** @test */
    function testa_delecao()
    {
        $this->criaListaDeNaturezas();

        $natureza = NaturezasJuridicas::findOrFail(1);
        
        $response = $this->get("admin/naturezasJuridicas/delete/{$natureza->id}");

        $response->assertStatus(302);
        $natureza = NaturezasJuridicas::find(1);
        $this->assertNull($natureza);
        
    }

    /** @test */
    function teste_de_update()
    {
        //$this->disableExceptionHandling();
        $this->criaListaDeNaturezas();

        $natureza = NaturezasJuridicas::findOrFAil(1);

        //$natureza->descricao = 'Outro teste';

        $response = $this->put("admin/naturezasJuridicas/{$natureza->id}", ['descricao'  => 'Autarquia Estadual2']);

        //dd($response);
        $response->assertStatus(200);

        $natureza = NaturezasJuridicas::find(1);

        $this->assertEquals('Autarquia Estadual2', $natureza->descricao);
        
    }
}
