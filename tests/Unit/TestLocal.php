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
    /**
     * Teste unitário de locais de implantação das TSs
     *
     * @return void
     * @test
     */
    public function teste_create()
    {
        $tecnologia = factory(Tecnologia::class)->create();
        $tecnologia->locais()->create([
            'ativo' => true,
            'uf_id' => 1,
            'cidade' => 'Taguatinga',
            'bairro' => 'norte',
            'dataImplantacao' => Carbon::today()->format('d-m-Y'),
        ]);

        $local = LocalImplantacao::first();

        $this->assertEquals('Taguatinga', $local->cidade);
    }

    //TODO teste reader
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
