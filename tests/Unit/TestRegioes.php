<?php

namespace Tests\Unit;

use App\Regioes;
use RegioesTableSeed;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestRegioes extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function can_create_regions()
    {
        Regioes::create([
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);
        
        $regiao = Regioes::firstOrFail();

        $this->assertEquals('CO', $regiao->sigla);
    }
    
    
    /** @test */
    function testa_criar_regiao_por_post()
    {
        //$this->disableExceptionHandling();
        
        $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $regiao = Regioes::firstOrFail();

        $this->assertEquals('CO', $regiao->sigla);
        
    }
    
    /** @test */
    function create_by_post_and_recive_response()
    {
        $this->disableExceptionHandling();
    	$response =  $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $response->assertStatus(200);
        $response->assertSee('CO');
        $response->assertSee('Centro - Oeste');
    }

    /** @test */
    function testa_listar_as_regioes()
    {
        Regioes::create([
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        Regioes::create([
            'sigla' => 'N',
            'Descricao' => 'Norte',
        ]);

        $response = $this->get('regioes');

        $response->assertStatus(200);
        $response->assertSee('CO');
        $response->assertSee('N');
        $response->assertSee('Centro - Oeste');
        $response->assertSee('Norte');
    }
    
    /** @test */
    function testa_seed_de_regioes()
    {
        $regioesSeed = new RegioesTableSeed;
        $regioesSeed->run();

        $regioes = Regioes::get();

        $this->assertTrue($regioes->pluck('sigla')->contains('N'));
        $this->assertTrue($regioes->pluck('sigla')->contains('NE'));
        $this->assertTrue($regioes->pluck('sigla')->contains('S'));
        $this->assertTrue($regioes->pluck('sigla')->contains('SE'));
        $this->assertTrue($regioes->pluck('sigla')->contains('CO'));
        $this->assertTrue($regioes->pluck('descricao')->contains('Centro - Oeste'));
    }
}