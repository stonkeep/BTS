<?php

namespace Tests\Unit;

use App\Instituicao;
use App\SubTemas;
use App\Tecnologia;
use App\Temas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestTecnologia extends TestCase
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


    public function cria_subtema()
    {
        $tema = Temas::create([
            'nome' => 'Alimentação'
        ]);

        $this->json('POST', "subtemas/create", [
            'tema_id'   => $tema->id,
            'descricao' => 'Higienização dos alimentos',
        ]);
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_create_tecnologia()
    {
        factory(Tecnologia::class)->create();
        $tecnologia = Tecnologia::firstOrFail();

        self::assertEquals($tecnologia->titulo, 'Teste GEPEM');
    }


    /** @test */
    public function teste_store_por_http()
    {
        $temasSeed = new \TemaTableSeeder();
        $temasSeed->run();

        //factory(Instituicao::class)->create();
        factory(Tecnologia::class)->create();

        $response = $this->json('POST', "tecnologias/create", [
//            'numeroInscricao' => '2017/0002',
            'titulo'               => 'Teste GEPEM2',
            'fimLucrativo'         => false,
            'tempoImplantacao'     => 2,
            'emAtividade'          => true,
            'inscricaoAnterior'    => false,
            'investimentoFBB'      => true,
            'categoria_id'         => 1,
            'resumo'               => 'Resumao',
            'tema_id'              => 1,
            'temaSecundario_id'    => 2,
            'problema'             => 'Problemao',
            'objetivoGeral'        => 'objetivo  Geral',
            'objetivoEspecifico'   => 'objetivo  Especifico',
            'descricao'            => 'descricao descricao descricao descricao descricao descricao ',
            'resultadosAlcancados' => 'Muitos resultados alcancados',
            'recursosMateriais'    => 'Recursos Materiais',
            'valorEstimado'        => ' valor Estimado ',
            'valorHumanos'         => 'valor Humanos',
            'depoimentoLivre'      => ' depoimentoLivre depoimentoLivre depoimentoLivre depoimentoLivre',
            'instituicaos_id'      => 1,
        ]);

//        $this->assertValidationError('numeroInscricao');
        $response->assertStatus(200);

        $tecnologia = Tecnologia::find(2);
        self::assertEquals($tecnologia->titulo, 'Teste GEPEM2');
    }


    /** @test */
    public function teste_reader()
    {
//        $this->disableExceptionHandling();
//        factory(Instituicao::class)->create();
        factory(Tecnologia::class)->create();

        $response = $this->get('tecnologias');

        $response->assertStatus(200);
        $response->assertSee('Teste GEPEM');
    }


    /** @test */
    public function teste_update()
    {
        $tecnologia = factory(Tecnologia::class)->create();

        $tecnologia->titulo = 'Outro teste';

        $response = $this->json('PUT', "tecnologias/update/{$tecnologia->id}", ['titulo' => 'Outro teste']);

        $response->assertStatus(200);

        $tecnologia = Tecnologia::firstOrFail();

        self::assertEquals($tecnologia->titulo, 'Outro teste');

    }


    /** @test */
    public function teste_delete()
    {
        $tecnologia = factory(Tecnologia::class)->create();

        $response = $this->get("tecnologias/delete/{$tecnologia->id}");

        $response->assertStatus(200);

        $tecnologia = Tecnologia::first();

        self::assertEmpty($tecnologia);

    }


    /** @test */
    public function teste_validacoes_vazio()
    {
        $this->response = $this->json('POST', "tecnologias/create", [
            'numeroInscricao'      => '',
            'titulo'               => '',
            'fimLucrativo'         => '',
            'tempoImplantacao'     => '',
            'emAtividade'          => '',
            'inscricaoAnterior'    => '',
            'investimentoFBB'      => '',
            'categoria_id'         => '',
            'resumo'               => '',
            'tema_id'              => '',
            'temaSecundario_id'    => '',
            'problema'             => '',
            'objetivoGeral'        => '',
            'objetivoEspecifico'   => '',
            'descricao'            => '',
            'resultadosAlcancados' => '',
            'recursosMateriais'    => '',
            'valorEstimado'        => '',
            'valorHumanos'         => '',
            'depoimentoLivre'      => '',
            'instituicaos_id'      => '',
        ]);

        $this->assertValidationError('numeroInscricao');
        $this->assertValidationError('titulo');
        $this->assertValidationError('fimLucrativo');
        $this->assertValidationError('tempoImplantacao');
        $this->assertValidationError('emAtividade');
        $this->assertValidationError('inscricaoAnterior');
        $this->assertValidationError('investimentoFBB');
        $this->assertValidationError('categoria_id');
        $this->assertValidationError('resumo');
        $this->assertValidationError('tema_id');
        $this->assertValidationError('temaSecundario_id');
        $this->assertValidationError('problema');
        $this->assertValidationError('objetivoGeral');
        $this->assertValidationError('objetivoEspecifico');
        $this->assertValidationError('descricao');
        $this->assertValidationError('resultadosAlcancados');
        $this->assertValidationError('recursosMateriais');
        $this->assertValidationError('valorEstimado');
        $this->assertValidationError('valorHumanos');
        $this->assertValidationError('depoimentoLivre');
        $this->assertValidationError('instituicaos_id');
    }


    /** @test */
    public function teste_validacoes_em_gerais()
    {
        $tecnologia = factory(Tecnologia::class)->create();

        //Testa campo unico
        $this->response = $this->json('POST', "tecnologias/create", $tecnologia->toArray());
        $this->assertValidationError('numeroInscricao');
        $this->assertValidationError('titulo');
        $this->assertValidationError('tema_id');
        $this->assertValidationError('temaSecundario_id');
        $this->assertValidationError('instituicaos_id');

        //testa boolean
        $tecnologia->emAtividade = 5;
        $tecnologia->inscricaoAnterior = 5;
        $tecnologia->investimentoFBB = 5;
        $this->response = $this->json('POST', "tecnologias/create", $tecnologia->toArray());
        $this->assertValidationError('emAtividade');
        $this->assertValidationError('inscricaoAnterior');
        $this->assertValidationError('investimentoFBB');
    }


    /** @test */
    public function teste_ligacao_tecnologia_com_subtemas()
    {
        $tecnologia = factory(Tecnologia::class)->create();
        $this->cria_subtema();
        $tecnologia->subtemas()->attach(1);

        $this->assertContains('Higienização dos alimentos', $tecnologia->subtemas->pluck('descricao'));
    }


    /** @test */
    function teste_sub_tema()
    {
        $this->disableExceptionHandling();
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
        
        $tecnologia = Tecnologia::where('titulo', 'dasdas')->first();
        $this->assertEquals('dasdas', $tecnologia->titulo);
        
        $subtemas = $tecnologia->subtemas;
        $this->assertEquals('Alimentação Escolar', $subtemas->find(1)->descricao);
        $this->assertEquals('Higienização dos Alimentos', $subtemas->find(2)->descricao);
                
    }

}
