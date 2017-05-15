<?php

namespace Tests\Unit;

use App\Cargos;
use App\Instituicao;
use App\NaturezasJuridicas;
use App\Tecnologia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestInstituicao extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;

    public function setUp()
    {
        parent::setUp(); 
        $temasSeed = new \TemaTableSeeder();
        $temasSeed->run();

        $subTemasSeed = new \SubTemaTableSeeder();
        $subTemasSeed->run();

        factory(Instituicao::class)->create();
    }


    public function cria_instituicao()
    {
        NaturezasJuridicas::create([
            'descricao' => 'Empresário(individual)'
        ]);

        Cargos::create([
            'descricao' => 'Técnico',
        ]);

        Instituicao::create([
            'CNPJ'             => 16286169000190,
            'razaoSocial'      => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea'       => 'nao sei',
            'ddd'              => 061,
            'telefone'         => 231546,
            'email'            => 'mateusgalasso@yahoo.com.br',
            'UF'               => 'DF',
            'cidade'           => 'Brasilia',
            'endereco'         => 'Quadra 107',
            'bairro'           => 'Aguas Claras',
            'CEP'              => 71920700,
            'site'             => 'fbb.org.br',
            'nomeCompleto'     => 'Mateus Galasso',
            'cargo_id'         => 1,
            'sexo'             => 'M',
            'CPF'              => 83745617509,
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

        $response = $this->json('POST', "instituicoes/create", [
            'CNPJ'             => 16286169000190,
            'razaoSocial'      => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea'       => 'nao sei',
            'ddd'              => 061,
            'telefone'         => 231546,
            'email'            => 'mateusgalasso@yahoo.com.br',
            'UF'               => 'DF',
            'cidade'           => 'Brasilia',
            'endereco'         => 'Quadra 107',
            'bairro'           => 'Aguas Claras',
            'CEP'              => 71920700,
            'site'             => 'fbb.org.br',
            'nomeCompleto'     => 'Mateus Galasso',
            'cargo_id'         => 1,
            'sexo'             => 'M',
            'CPF'              => 83745617509,
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

        $response = $this->json('PUT', "instituicoes/update/{$instituicao->id}",
            ['CNPJ' => 99999999999999, 'CPF' => 11111111111]);

        $response->assertStatus(200);
        $response->assertSee('99999999999999');
        $response->assertSee('11111111111');
        $response->assertDontSee('16286169000190');
        $response->assertDontSee('83745617509');
    }


    /** @test */
    function testa_delete()
    {
        $instituicao = factory(Instituicao::class)->create();

        $response = $this->json('DELETE', "instituicoes/delete/{$instituicao->id}");

        $response->assertStatus(200);
        $response->assertDontSee('16286169000190');
        $response->assertDontSee('83745617509');
    }


    /** @test */
    function testa_consulta_que_retorna_lista()
    {
        factory(Instituicao::class)->create();
        Instituicao::create([
            'CNPJ'             => 99999999999999,
            'razaoSocial'      => 'Teste de Instituicao',
            'naturezaJuridica' => 1,
            'nomeDaArea'       => 'nao sei',
            'ddd'              => 061,
            'telefone'         => 231546,
            'email'            => 'mateusgalasso@yahoo.com.br',
            'UF'               => 'DF',
            'cidade'           => 'Brasilia',
            'endereco'         => 'Quadra 107',
            'bairro'           => 'Aguas Claras',
            'CEP'              => 71920700,
            'site'             => 'fbb.org.br',
            'nomeCompleto'     => 'Mateus Galasso',
            'cargo_id'         => 1,
            'sexo'             => 'M',
            'CPF'              => 11111111111,
        ]);

        $response = $this->get("instituicoes");

        $response->assertStatus(200);
        $response->assertSee('99999999999999');
        $response->assertSee('16286169000190');
        $response->assertSee('11111111111');
        $response->assertSee('83745617509');
        $response->assertSee('Mateus Galasso');

    }

    /** @test */
    function testa_validacoes()
    {
        //$this->disableExceptionHandling();
        //
        //factory(Instituicao::class)->create();
        //$instituicao = Instituicao::find(1);
        //$instituicaoTeste = $instituicao;

        $instituicaoTeste = [
            'CNPJ'             => '',
            'razaoSocial'      => '',
            'naturezaJuridica' => '',
            'nomeDaArea'       => '',
            'ddd'              => '',
            'telefone'         => '',
            'email'            => '',
            'UF'               => '',
            'cidade'           => '',
            'endereco'         => '',
            'bairro'           => '',
            'CEP'              => '',
            'site'             => '',
            'nomeCompleto'     => '',
            'cargo_id'         => '',
            'sexo'             => '',
            'CPF'              => '',
        ];

        //campos requeridos
        $this->response = $this->json('POST', "instituicoes/create", $instituicaoTeste);
//        $this->assertValidationError('CNPJ');
//        $this->assertValidationError('naturezaJuridica');
//        $this->assertValidationError('nomeDaArea');
//        $this->assertValidationError('ddd');
//        $this->assertValidationError('telefone');
//        $this->assertValidationError('email');
//        $this->assertValidationError('UF');
//        $this->assertValidationError('cidade');
//        $this->assertValidationError('endereco');
//        $this->assertValidationError('bairro');
//        $this->assertValidationError('CEP');
//        $this->assertValidationError('site');
//        $this->assertValidationError('nomeCompleto');
//        $this->assertValidationError('cargo_id');
//        $this->assertValidationError('sexo');
//        $this->assertValidationError('CPF');



        //Verifica se CNPJ é numerico
        $instituicaoTeste['CNPJ'] = 'AAAAAAAA';
        $this->response = $this->json('POST', "instituicoes/create", $instituicaoTeste);
//        $this->assertValidationError('CNPJ');
        
        //Campo único
        factory(Instituicao::class)->create();
        $instituicaoTeste = Instituicao::find(1);
        $this->response = $this->json('POST', "instituicoes/create", $instituicaoTeste->toArray());
//        $this->assertValidationError('CNPJ');
        
        
        
        //Verifica campo existe na relação naturezaJuridica
        $instituicaoTeste->naturezaJuridica = 2;
        $this->response = $this->json('POST', "instituicoes/create", $instituicaoTeste->toArray());
//        $this->assertValidationError('naturezaJuridica');

        // Cargos
        $instituicaoTeste->cargo_id = 99;
        $this->response = $this->json('POST', "instituicoes/create", $instituicaoTeste->toArray());
//        $this->assertValidationError('cargo_id');
    }

    /** @test */
    function testa_relacionamento_com_tecnologia()
    {
        $instituicao = factory(Instituicao::class)->create();
        //factory(Tecnologia::class)->create();
        $data = [
            "numeroInscricao"      => "2017/1",
            "titulo"               => "dasdas",
            "fimLucrativo"         => "1",
            "tempoImplantacao"     => "1",
            "emAtividade"          => "0",
            "inscricaoAnterior"    => "0",
            "investimentoFBB"      => "1",
            "categoria_id"         => 1,
            "resumo"               => "dasd",
            "tema_id"              => 1,
            //"subtema1"             => [1],
            "temaSecundario_id"    => 1,
            //"subtema2"             => [1,2],
            "problema"             => "das",
            "objetivoGeral"        => "das",
            "objetivoEspecifico"   => "dasdas",
            "descricao"            => "dasd",
            "resultadosAlcancados" => "asd",
            "recursosMateriais"    => "s",
            "valorEstimado"        => "sdasdsa",
            "valorHumanos"         => "asd",
            "depoimentoLivre"      => "asda",
            //"instituicaos_id"      => 1
        ];

        $instituicao->tecnologias()->create($data);
        
        $tecnologia =  $instituicao->tecnologias()->first();
        $this->assertEquals('2017/1', $tecnologia->numeroInscricao);
    }

    /** @test */
    function testa_relacionamento_instituicao_com_json()
    {
        $this->disableExceptionHandling();
        
        factory(Instituicao::class)->create();
        $data = [
            "titulo"               => "dasdas",
            "fimLucrativo"         => "1",
            "tempoImplantacao"     => "1",
            "emAtividade"          => "0",
            "inscricaoAnterior"    => "0",
            "investimentoFBB"      => "1",
            "categoria_id"         => 1,
            "resumo"               => "dasd",
            "tema_id"              => 1,
            "subtema1"             => [1],
            "temaSecundario_id"    => 1,
            "subtema2"             => [1,2],
            "problema"             => "das",
            "objetivoGeral"        => "das",
            "objetivoEspecifico"   => "dasdas",
            "descricao"            => "dasd",
            "resultadosAlcancados" => "asd",
            "recursosMateriais"    => "s",
            "valorEstimado"        => "sdasdsa",
            "valorHumanos"         => "asd",
            "depoimentoLivre"      => "asda",
            "instituicao_id"      => 1
        ];

        $response = $this->json('POST', "tecnologias/create", $data);
        $response->assertStatus(200);
    }

    //TODO criar ligação do usuário com a instituição
    
}
