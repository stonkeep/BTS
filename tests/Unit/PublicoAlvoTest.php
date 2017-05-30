<?php

namespace Tests\Unit;

use App\PublicosAlvo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class PublicoAlvoTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
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
        
        $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Afrodescentes'
        ]);

        $publico = PublicosAlvo::firstOrFail();
        $this->assertEquals('Afrodescentes', $publico->descricao);
    }
    
    /** @test */
    function testa_retorno_de_gravacao_por_post()
    {
        $this->disableExceptionHandling();
        
    	$response =  $this->json('POST', "/admin/publicosAlvo/create", [
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

        $response = $this->get('admin/publicosAlvo');

        $response->assertStatus(200);

        $response->assertSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');
        
    }

    /** @test */
    function testa_validacao_de_campos_em_lista()
    {
        $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Afrodescentes',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $this->response =  $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Afrodescentes',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $this->assertValidationError('descricao');
    }

    /** @test */
    function teste_de_delete()
    {
        $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Afrodescentes',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $response = $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Povos Tradicionais',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $response->assertStatus(200);
        $response->assertSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');

        $publico = PublicosAlvo::firstOrFail();

        $response = $this->json('get', "admin/publicosAlvo/delete/{$publico->id}");

        $response->assertStatus(200);

        $response->assertDontSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');
        
    }
    
    /** @test */
    function teste_de_update()
    {
        $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Afrodescentes',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $response = $this->json('POST', "/admin/publicosAlvo/create", [
            'descricao' => 'Povos Tradicionais',
            'created_at' => '2017-03-31 18:58:05'
        ]);

        $response->assertStatus(200);
        $response->assertSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');

        $publico = PublicosAlvo::firstOrFail();

        $response = $this->json('PUT', "admin/publicosAlvo/update/{$publico->id}", ['descricao' => 'Mulheres',]);

        $response->assertStatus(200);
        $response->assertDontSee('Afrodescentes');
        $response->assertSee('Povos Tradicionais');        
        $response->assertSee('Mulheres');        
    }
    
}
