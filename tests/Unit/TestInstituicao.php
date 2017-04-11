<?php

namespace Tests\Unit;

use App\Cargos;
use App\Instituicao;
use App\NaturezasJuridicas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestInstituicao extends TestCase
{
    use DatabaseMigrations;

    public function cria_instituicao()
    {
        NaturezasJuridicas::create([
            'descricao' => 'Empresário(individual)'
        ]);

        Cargos::create([
            'descricao' => 'Técnico',
        ]);

        Instituicao::create([
            'CNPJ' => 16286169000190,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargos_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_create()
    {
        $this->cria_instituicao();

        $instituicao = Instituicao::firstOrFail();

        $this->assertEquals($instituicao->CNPJ, 16286169000190);
    }

    /** @test */
    public function teste_de_cadastramento_por_post()
    {
        $this->disableExceptionHandling();

        $natureza = factory(NaturezasJuridicas::class)->create();
        $cargo = factory(Cargos::class)->create();

        $response = $this->json('POST', "instituicoes/create",[
            'CNPJ' => 16286169000190,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ]);


        $response->assertStatus(200);
        $response->assertSee('16286169000190');
        $response->assertSee($natureza->descricao);
        $response->assertSee($cargo->descricao);
        $response->assertSee('83745617509');

    }

    /** @test */
    public function testa_leitura()
    {
        factory(Instituicao::class)->create();
        $response = $this->get("instituicoes");

        $response->assertStatus(200);
        $response->assertSee('16286169000190');
        $response->assertSee('83745617509');
    }

    /** @test */
    function teste_de_update()
    {
        $instituicao = factory(Instituicao::class)->create();
        
        $response = $this->json('PUT', "instituicoes/update/{$instituicao->id}", ['CNPJ' => 99999999999999, 'CPF' => 11111111111]);

        $response->assertStatus(200);
        $response->assertSee('99999999999999');
        $response->assertSee('11111111111');
        $response->assertDontSee('16286169000190');
        $response->assertDontSee('83745617509');
    }

    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
    //TODO testa relacionamento hasMany
}
