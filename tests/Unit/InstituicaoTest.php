<?php

namespace Tests\Unit;

use App\Cargos;
use App\Instituicao;
use App\NaturezasJuridicas;
use App\Tecnologia;
use App\User;
use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestsUtil;
use Tests\ValidationsFields;

class InstituicaoTest extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;

    use TestsUtil;
    private $user;


    public function setUp()
    {
        parent::setUp();
        $temasSeed = new \TemaTableSeeder();
        $temasSeed->run();

        $subTemasSeed = new \SubTemaTableSeeder();
        $subTemasSeed->run();

        factory(Instituicao::class)->create();

        //cria usuário admin logado
        $this->geraUsuario();
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
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    //public function teste_create()
    //{
    //    $this->cria_instituicao();
    //
    //    $instituicao = Instituicao::where('CNPJ', 16286169000190);
    //
    //    dd($instituicao->CNPJ);
    //    $this->assertNotNull($instituicao);
    //}


    /** @test */
    public function teste_de_cadastramento_por_post()
    {
        //$this->disableExceptionHandling();

        $natureza = factory(NaturezasJuridicas::class)->create();
        $cargo = factory(Cargos::class)->create();
        $this->response = $response = $this->post('/admin/instituicoes/', [
            'CNPJ' => 33216167000143,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 2,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'http://www.fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ]);

        $response->assertStatus(302);

        $instituição = Instituicao::find(2);

        $this->assertEquals('33216167000143', $instituição->CNPJ);
        $this->assertEquals('Empresário(individual)', $instituição->natureza->descricao);
        $this->assertEquals('Empresário(individual)', $instituição->cargo->descricao);
    }


    /** @test */
    public function testa_leitura()
    {
        $this->disableExceptionHandling();
        Cargos::create([
            'descricao' => 'Técnico',
        ]);
        //factory(Instituicao::class)->create();
        $instituicao = Instituicao::firstOrFail();

        $response = $this->get("admin/instituicoes");

        $response->assertStatus(200);
        $response->assertSee($instituicao->razaoSocial);
    }


    /** @test */
    function teste_de_update()
    {
        //Cria instituição para atualizar
        $natureza = factory(NaturezasJuridicas::class)->create();
        $cargo = factory(Cargos::class)->create();
        $this->response = $response = $this->post('/admin/instituicoes/', [
            'CNPJ' => 33216167000143,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 2,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'http://www.fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ]);

        $response->assertStatus(302);

        //Busca e atualiza instituição
        $instituicao = Instituicao::find(2);
        $instituicao->CNPJ = 31918082000181;
        $instituicao->CPF = 57406954301;

        //chama controler para atualizar
        $this->response = $response = $this->put("admin/instituicoes/{$instituicao->id}",
            $instituicao->toArray()); //Precisa ser um Array

        //busca instituicao
        $instituicao = Instituicao::find(2);

        //assert
        $response->assertStatus(200);
        $this->assertEquals($instituicao->CNPJ, '31918082000181');
        $this->assertEquals($instituicao->CPF, '57406954301');
    }


    /** @test */
    function testa_delete()
    {
        $this->disableExceptionHandling();

        $response = $this->get("admin/instituicoes/delete/1");

        $response->assertStatus(302);
        $response->assertDontSee('16286169000190');
        $response->assertDontSee('83745617509');
    }


    /** @test */
    function testa_consulta_que_retorna_lista()
    {
        Instituicao::create([
            'CNPJ' => 99999999999999,
            'razaoSocial' => 'Teste de Instituicao2',
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
            'CPF' => 11111111111,
        ]);

        $response = $this->get("admin/instituicoes");

        $response->assertStatus(200);
        $response->assertSee('Teste de Instituicao');
        $response->assertSee('Teste de Instituicao2');


    }


    /** @test */
    function testa_validacoes()
    {
        //$this->disableExceptionHandling();

        $instituicaoTeste = [
            'CNPJ' => '',
            'razaoSocial' => '',
            'naturezaJuridica' => '',
            'nomeDaArea' => '',
            'ddd' => '',
            'telefone' => '',
            'email' => '',
            'UF' => '',
            'cidade' => '',
            'endereco' => '',
            'bairro' => '',
            'CEP' => '',
            'site' => '',
            'nomeCompleto' => '',
            'cargo_id' => '',
            'sexo' => '',
            'CPF' => '',
        ];

        //campos requeridos
        $this->response = $this->json('POST', "/admin/instituicoes/", $instituicaoTeste);
        //$this->assertValidationError('CNPJ');
        $this->assertValidationError('naturezaJuridica');
        $this->assertValidationError('nomeDaArea');
        $this->assertValidationError('ddd');
        $this->assertValidationError('telefone');
        $this->assertValidationError('email');
        $this->assertValidationError('UF');
        $this->assertValidationError('cidade');
        $this->assertValidationError('endereco');
        $this->assertValidationError('bairro');
        $this->assertValidationError('CEP');
        $this->assertValidationError('site');
        $this->assertValidationError('nomeCompleto');
        $this->assertValidationError('cargo_id');
        $this->assertValidationError('sexo');
        $this->assertValidationError('CPF');


        factory(Instituicao::class)->create();
        $instituicaoTeste = Instituicao::find(1);
        //Verifica campo existe na relação naturezaJuridica
        $instituicaoTeste->naturezaJuridica = 999;
        $this->response = $this->json('POST', "/admin/instituicoes/", $instituicaoTeste->toArray());
        $this->assertValidationError('naturezaJuridica');

        // Cargos
        $instituicaoTeste->cargo_id = 99;
        $this->response = $this->json('POST', "/admin/instituicoes/", $instituicaoTeste->toArray());
        $this->assertValidationError('cargo_id');

        //Testa CNPJ vazio
        $instituicaoTeste = [
            'CNPJ' => '',
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 2,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'http://www.fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ];
        $this->response = $this->json('POST', "/admin/instituicoes/", $instituicaoTeste);
        $this->assertValidationError('CNPJ');

        //Verifica se CNPJ é numerico
        $instituicaoTeste['CNPJ'] = 'AAAAAAAA';
        $this->response = $this->json('POST', "/admin/instituicoes/", $instituicaoTeste);
        $this->assertValidationError('CNPJ');

    }

    /** @test */
    function testa_cnpj_unico()
    {
//        $this->disableExceptionHandling();

        factory(Instituicao::class)->create();

        $data = [
            'CNPJ' => 16286169000190,
            'razaoSocial' => 'Teste de Instituicao',
            'naturezaJuridica' => 2,
            'nomeDaArea' => 'nao sei',
            'ddd' => 061,
            'telefone' => 231546,
            'email' => 'mateusgalasso@yahoo.com.br',
            'UF' => 'DF',
            'cidade' => 'Brasilia',
            'endereco' => 'Quadra 107',
            'bairro' => 'Aguas Claras',
            'CEP' => 71920700,
            'site' => 'http://www.fbb.org.br',
            'nomeCompleto' => 'Mateus Galasso',
            'cargo_id' => 1,
            'sexo' => 'M',
            'CPF' => 83745617509,
        ];

        $instituição = Instituicao::find(1);


        //Campo único
        $this->response = $this->json('POST', "/admin/instituicoes/", $data);
        $this->response = $this->json('POST', "/admin/instituicoes/", $data);

        $this->assertValidationError('CNPJ');
    }


    ///** @test */
    //function testa_relacionamento_com_tecnologia()
    //{
    //
    //    //factory(Tecnologia::class)->create();
    //    $data = [
    //        "numeroInscricao"      => "2017/1",
    //        "titulo"               => "dasdas",
    //        "fimLucrativo"         => "1",
    //        "tempoImplantacao"     => "1",
    //        "emAtividade"          => "0",
    //        "inscricaoAnterior"    => "0",
    //        "investimentoFBB"      => "1",
    //        "categoria_id"         => 1,
    //        "resumo"               => "dasd",
    //        "tema_id"              => 1,
    //        //"subtema1"             => [1],
    //        "temaSecundario_id"    => 1,
    //        //"subtema2"             => [1,2],
    //        "problema"             => "das",
    //        "objetivoGeral"        => "das",
    //        "objetivoEspecifico"   => "dasdas",
    //        "descricao"            => "dasd",
    //        "resultadosAlcancados" => "asd",
    //        "recursosMateriais"    => "s",
    //        "valorEstimado"        => "sdasdsa",
    //        "valorHumanos"         => "asd",
    //        "depoimentoLivre"      => "asda",
    //        //"instituicaos_id"      => 1
    //    ];
    //    $instituicao = Instituicao::firstOrFail();
    //    $instituicao->tecnologias()->create($data);
    //
    //    $tecnologia = $instituicao->tecnologias()->first();
    //    $this->assertEquals('2017/1', $tecnologia->numeroInscricao);
    //}


    ///** @test */
    //function testa_relacionamento_da_tecnologia_com_instituicao_usando_json()
    //{
    //
    //    factory(Instituicao::class)->create();
    //    $data = [
    //        "titulo"               => "Teste instituicao",
    //        "fimLucrativo"         => "1",
    //        "tempoImplantacao"     => "1",
    //        "emAtividade"          => "0",
    //        "inscricaoAnterior"    => "0",
    //        "investimentoFBB"      => "1",
    //        "categoria_id"         => 1,
    //        "resumo"               => "dasd",
    //        "tema_id"              => 1,
    //        "subtema1"             => [1],
    //        "temaSecundario_id"    => 2,
    //        "subtema2"             => [30, 34],
    //        "problema"             => "das",
    //        "objetivoGeral"        => "das",
    //        "objetivoEspecifico"   => "dasdas",
    //        "descricao"            => "dasd",
    //        "resultadosAlcancados" => "asd",
    //        "recursosMateriais"    => "s",
    //        "recursosHumanos"      => "H",
    //        "valorEstimado"        => "sdasdsa",
    //        "valorHumanos"         => "asd",
    //        "depoimentoLivre"      => "asda",
    //        "instituicao_id"       => 1
    //    ];
    //
    //    $this->response = $response = $this->json('POST', "/admin/tecnologias/create", $data);
    //
    //    //$this->assertValidationError('titulo');
    //    $response->assertStatus(200);
    //
    //    $instituicao = Instituicao::first();
    //    $this->assertEquals($instituicao->razaoSocial, 'Teste de Instituicao');
    //
    //    $tec = $instituicao->tecnologias->first();
    //    $this->assertEquals($tec->titulo, 'Teste instituicao');
    //}

    /** @test */
    function teste_ligacao_da_instituicao_com_usuario_nao_logado()
    {
        factory(User::class)->create();
        $user = User::first();
        factory(Instituicao::class)->create();
        $instituicao = Instituicao::first();

        $instituicao->users()->attach($user);

        $this->assertEquals($instituicao->users()->first()->name, $user->name);
    }


    /** @test */
    function teste_ligacao_da_instituicao_com_usuario_logado()
    {
        factory(User::class)->create();
        $user = User::first();
        Auth::login($user);
        $user = Auth::user();
        factory(Instituicao::class)->create();
        $instituicao = Instituicao::first();

        $instituicao->users()->attach($user);

        $this->assertEquals($instituicao->users()->first()->name, $user->name);
    }
}
