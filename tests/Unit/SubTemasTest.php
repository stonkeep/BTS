<?php

namespace Tests\Unit;

use App\SubTemas;
use App\Temas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class SubTemasTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;


    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function teste_de_create()
    {
        //Cria tema e vincula o sub tema a ele
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);
        
        $subtema = SubTemas::create([
            'tema_id' => $tema->id,
            'descricao' => 'Alimentação Escolar',
        ]);
        
        //Faz o teste para verificar se a ligação de tema e subTema esta ok
        $subTemaConf = SubTemas::firstOrFail();
        
        $this->assertEquals($subtema->descricao, $subTemaConf->descricao);
        $this->assertEquals($tema->nome, $subTemaConf->tema->nome);
        $this->assertNotNull($tema->subtemas());
    }

    //TODO criar teste de CREATE por post
    /** @test */
    function teste_crete_por_post()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);
        
    	$this->json('POST', "subtemas/create",[
            'tema_id' => $tema->id,
            'descricao' => 'Alimentação Escolar',
        ]);

        $response = $this->json('POST', "subtemas/create",[
            'tema_id' => $tema->id,
            'descricao' => 'Higienização dos alimentos',
        ]);

        dd($response);
        
        $response->assertStatus(200);
        $response->assertSee('Alimentação');
        $response->assertSee('Alimentação Escolar');
        $response->assertSee('Higienização dos alimentos');
    }   


    //TODO criar teste de READ
    //TODO criar teste de UPDATE
    //TODO criar teste de DELETE
    //TODO testar validações
}
