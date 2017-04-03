<?php

namespace Tests\Unit;

use App\PublicosAlvo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestPublicoAlvo extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function testa_a_criacao_do_publico_alvo()
    {
        PublicosAlvo::create([
            'descricao' => 'Afrodescentes'
        ]);

        $publico = PublicosAlvo::firstOrFail();

        $this->assertEquals('Afrodescentes', $publico->descricao);
    }
    
    /** @test */
    function teste_criacao_publico_alvo_por_post()
    {
        //$this->disableExceptionHandling();
        
        $this->json('POST', "/publicosAlvo/create", [
            'descricao' => 'Afrodescentes'
        ]);

        $publico = PublicosAlvo::firstOrFail();
        $this->assertEquals('Afrodescentes', $publico->descricao);
    }
    
    /** @test */
    function testa_retorno_de_gravacao_por_post()
    {
        $this->disableExceptionHandling();
        
    	$response =  $this->json('POST', "/publicosAlvo/create", [
            'descricao' => 'Afrodescentes',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $response->assertStatus(200);

        $response->assertSee('Afrodescentes');
        $response->assertSee('2017-03-31 18:58:05');
    }

    /** @test */
    function testa_se_consegue_ver_a_lista_de_publios_alvos()
    {
        PublicosAlvo::create([
            'descricao' => 'Afrodescentes'
        ]);

        PublicosAlvo::create([
            'descricao' => 'Povos Tradicionais'
        ]);

        $response = $this->get('/publicosAlvo');

        $response->assertStatus(200);

        $response->assertSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');
        
    }
    //TODO criar teste de delete
    //TODO criar teste de update
    //TODO testar validações
    
}
