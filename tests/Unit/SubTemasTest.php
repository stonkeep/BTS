<?php

namespace Tests\Unit;

use App\SubTemas;
use App\Temas;
use TemaTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class SubTemasTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;


    public function cria_subtema()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);

        $this->json('POST', "subtemas/create", [
            'tema_id' => $tema->id,
            'descricao' => 'Higienização dos alimentos',
        ]);
    }

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

    /** @test */
    function teste_create_por_post()
    {
        $this->cria_subtema();

        $response = $this->json('POST', "subtemas/create", [
            'tema_id' => 1,
            'descricao' => 'Alimentação Escolar',
        ]);

        $response->assertStatus(200);
        $response->assertSee('Alimentação');
        $response->assertSee('Alimentação Escolar');
        $response->assertSee('Higienização dos alimentos');
    }


    /** @test */
    function teste_reade()
    {
        $this->cria_subtema();

        $response = $this->get("subtemas");

        $response->assertStatus(200);
        $response->assertSee('Alimentação');
        $response->assertSee('Higienização dos alimentos');
    }

    /** @test */
    function teste_update()
    {
        $this->cria_subtema();

        $subTema = SubTemas::firstOrFail();

        $response = $this->json('PUT', "subtemas/update/{$subTema->id}", [
            'descricao' => 'Outro Subtema',
        ]);

        $response->assertStatus(200);
        $response->assertSee('Outro Subtema');
        $response->assertDontSee('Higienização dos alimentos');

    }

    /** @test */
    function teste_delete()
    {
        $this->cria_subtema();

        $this->json('POST', "subtemas/create", [
            'tema_id' => 1,
            'descricao' => 'Alimentação Escolar',
        ]);

        $subTema = SubTemas::firstOrFail();

        $response = $this->get("subtemas/delete/{$subTema->id}");

        $response->assertStatus(200);
        $response->assertDontSee('Higienização dos alimentos');
        $response->assertSee('Alimentação Escolar');
    }


    /** @test */
    public function testa_validacao_id_tema_exist()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);

        //testa validacao de id do tema
        $this->response = $this->json('POST', "subtemas/create", [
            'tema_id' => 2,
            'descricao' => 'Alimentação Escolar',
        ]);
        $this->assertValidationError('tema_id');
    }


    /** @test */
    public function testa_validacao_de_descricao_unica()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);

        //testa validacao unica da descricao
        $this->response = $this->json('POST', "subtemas/create", [
            'tema_id' => 1,
            'descricao' => 'Alimentação Escolar',
        ]);

        $this->response = $this->json('POST', "subtemas/create", [
            'tema_id' => 1,
            'descricao' => 'Alimentação Escolar',
        ]);

        $this->assertValidationError('descricao');
    }


    /** @test */
    public function testa_campos_requeridos()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);

        $this->response = $this->json('POST', "subtemas/create", [
//            'tema_id' => 1,
            'descricao' => 'Alimentação Escolar',
        ]);
        $this->assertValidationError('tema_id');


        $this->response = $this->json('POST', "subtemas/create", [
            'tema_id' => 1,
//            'descricao' => 'Alimentação Escolar',
        ]);
        $this->assertValidationError('descricao');
    }
}
