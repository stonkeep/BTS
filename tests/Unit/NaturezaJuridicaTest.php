<?php

namespace Tests\Unit;

use App\NaturezasJuridicas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NaturezaJuridica extends TestCase
{
    use DatabaseMigrations;
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
        $this->json('POST', "naturezasJuridicas/create", [
            'descricao' => 'Autarquia Estadual'
        ]);

        $natureza = NaturezasJuridicas::firstOrFail();

        $this->assertEquals('Autarquia Estadual', $natureza->descricao);
    }
    
    /** @test */
    function testa_o_retorno_da_gravacao_por_post()
    {   
        $response = $this->json('POST', "naturezasJuridicas/create", [
            'descricao' => 'Autarquia Federal',
            'created_at' => '2017-03-31 19:27:54',
            'updated_at' => '2017-03-31 19:27:55'
        ]);

        $response->assertStatus(200);

        $response->assertSee('Autarquia Federal');
        $response->assertSee('1');
        $response->assertSee('2017-03-31 19:27:54');
        $response->assertSee('2017-03-31 19:27:55');
    }
}
