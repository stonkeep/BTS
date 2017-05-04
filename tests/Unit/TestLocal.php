<?php

namespace Tests\Unit;

use App\LocalImplantacao;
use App\Tecnologia;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestLocal extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;


    public function criaLocal()
    {
        $tecnologia = factory(Tecnologia::class)->create();
        $tecnologia->locais()->create([
            'ativo' => true,
            'uf' => 'DF',
            'cidade' => 'Taguatinga',
            'bairro' => 'norte',
            'dataImplantacao' => Carbon::today()->format('d-m-Y'),
        ]);
    } 
    /**
     * Teste unitário de locais de implantação das TSs
     *
     * @return void
     * @test
     */
    public function teste_create()
    {
        $this->criaLocal();

        $local = LocalImplantacao::first();

        $this->assertEquals('Taguatinga', $local->cidade);
    }

    /** @test */
    function teste_update()
    {
        $this->criaLocal();
        $tecnologia = Tecnologia::first();
        $tecnologia->locais()->create([
            'ativo' => true,
            'uf' => 'DF',
            'cidade' => 'Brasília',
            'bairro' => 'Asa norte',
            'dataImplantacao' => Carbon::today()->format('d-m-Y'),
        ]);
        $locais = LocalImplantacao::where('tecnologia_id', $tecnologia->id);
        $locais->where('cidade', 'Brasília')->update(['uf' => 'GO']);
        $local = LocalImplantacao::where('uf', 'GO')->first();

        $this->assertEquals('GO', $local->uf);
    }
    
    /** @test */
    function teste_delete()
    {
        $this->criaLocal();
        $tecnologia = Tecnologia::first();

        $locais = LocalImplantacao::where('id', $tecnologia->id)->get();
        $locais->first()->delete();

        $this->assertEmpty($tecnologia->locais);
    }
    
    /** @test */
    function teste_validacao()
    {
        $tecnologia = factory(Tecnologia::class)->create();
        $datas = 
            [
                'ativo'           => '',
                'uf'              => '',
                'cidade'          => '',
                'bairro'          => '',
                'dataImplantacao' => '',
        ];

        $valida = LocalImplantacao::valida($tecnologia, $datas);
        $valida = $valida->toArray();
        
        $this->assertArrayHasKey('ativo', $valida);
        $this->assertArrayHasKey('uf', $valida);
        $this->assertArrayHasKey('cidade', $valida);
        $this->assertArrayHasKey('bairro', $valida);
        $this->assertArrayHasKey('dataImplantacao', $valida);

        $datas =
            [
                'ativo' => true,
                'uf' => 'DF',
                'cidade' => 'Brasília',
                'bairro' => 'Asa norte',
                'dataImplantacao' => Carbon::today()->format('Y'),
            ];
        $valida = LocalImplantacao::valida($tecnologia, $datas);
        $valida = $valida->toArray();
        $this->assertArrayHasKey('dataImplantacao', $valida);
        
       
    }
    /** @test */
    function teste_validacao_array()
    {
        $tecnologia = factory(Tecnologia::class)->create();
        
        $datas = [
            [
                'ativo' => true,
                'uf' => 'DF',
                'cidade' => 'Brasília',
                'bairro' => 'Asa norte',
                'dataImplantacao' => Carbon::today()->format('Y'),
            ],
            [
                'ativo' => true,
                'uf' => 'GO',
                'cidade' => 'taguatinga',
                'bairro' => 'Asa norte',
                'dataImplantacao' => Carbon::today()->format('m-d-Y'),
            ],
        ];
        $valida = LocalImplantacao::valida($tecnologia, $datas);
        $valida = $valida->toArray();
        $this->assertArrayHasKey('dataImplantacao', $valida);
    }
}
