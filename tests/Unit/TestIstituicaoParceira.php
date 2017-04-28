<?php

namespace Tests\Unit;

use App\Instituicao;
use App\InstituicaoParceira;
use App\Tecnologia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestIstituicaoParceira extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function testExample()
    {
        InstituicaoParceira::create([
            'nome' => 'Universidade Federal do Paraná UFPR',
            'atuacao' => ' A parceria acontece desde 2004, com o Centro de Estudos em Segurança Pública e Direitos Humanos. Esta entidade, por meio de seu responsável, Prof. Dr. Pedro Rodolfo Bodê de Moraes apoia os trabalhos de intervenção realizados. Além de compartilhar conhecimentos, é por intermédio desta parceria que os cursos ofertados aos educadores de suas escolas parceiras são chancelados como cursos de extensão da UFPR e seus participantes são devidamente certificados.',
        ]);

        $instituicaoParceria = InstituicaoParceira::first();

        $this->assertEquals('Universidade Federal do Paraná UFPR', $instituicaoParceria->nome);

        InstituicaoParceira::create([
            'nome' => 'Universidade Federal',
            //'atuacao' => '',
        ]);

        $instituicaoParceria = InstituicaoParceira::find(2);
        $this->assertEquals('Universidade Federal', $instituicaoParceria->nome);
        $this->assertNull($instituicaoParceria->atuacao);
    }

    /** @test */
    function teste_update()
    {
        $instituicaoParceria =  factory(InstituicaoParceira::class)->create();

        $instituicaoParceria->nome = 'CEUB';
        $instituicaoParceria->save();

        $instituicaoParceria = InstituicaoParceira::first();

        $this->assertEquals('CEUB', $instituicaoParceria->nome);
        
    }

    /** @test */
    function teste_delete()
    {
        $instituicaoParceria =  factory(InstituicaoParceira::class)->create();
        $instituicaoParceria->delete();

        $instituicaoParceria = InstituicaoParceira::first();

        $this->assertNull($instituicaoParceria);
    }

    /** @test */
    function teste_list()
    {
        factory(InstituicaoParceira::class)->create();
        InstituicaoParceira::create([
            'nome' => 'Universidade Federal',
        ]);

        $instituicoes = InstituicaoParceira::all();

        $this->assertContains('Universidade Federal', $instituicoes->pluck('nome'));
        $this->assertCount(2, $instituicoes);
        
    }

    /** @test */
    function teste_validacao()
    {
        factory(Tecnologia::class)->create();
        
        $tecnologia = Tecnologia::firstOrFail();

        $datas = [
            ['nome' => 'Universidade1'],
            ['nome' => 'Universidade2'],
        ];

        InstituicaoParceira::grava($tecnologia, $datas);
        
        $resultado = $tecnologia->instituicoesParceiras()->get()->pluck('nome');
        $this->assertCount(2, $resultado);
        $this->assertContains('Universidade1', $resultado);
        $this->assertContains('Universidade2', $resultado);
        
        $datas = [
            ['nome' => 'Universidade3'],
        ];

        InstituicaoParceira::grava($tecnologia, $datas);
        $resultado = $tecnologia->instituicoesParceiras()->get()->pluck('nome');
        $this->assertCount(3, $resultado);
        $this->assertContains('Universidade3', $resultado);
        
    }
    //TODO teste validações

}
