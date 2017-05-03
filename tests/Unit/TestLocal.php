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
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
