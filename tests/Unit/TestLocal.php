<?php

namespace Tests\Unit;

use App\LocalImplantacao;
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
        factory(LocalImplantacao::class)->create();

        $local = LocalImplantacao::first();

        $this->assertEquals('Taguatinga', $local->cidade);

        dd();
        
    }

    //TODO teste create
    //TODO teste reader
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
