<?php

namespace Tests\Unit;

use App\VigenciasPremio;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestVigenciaPremio extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_create()
    {
        factory(VigenciasPremio::class)->create();

        $vigencia = VigenciasPremio::first();

        $this->assertEquals('2017', $vigencia->edicao);
    }

    /** @test */
    public function teste_reader()
    {
        factory(VigenciasPremio::class)->create();

        $response = $this->get('premios');

        $response->assertStatus(200);

        $response->assertSee('2017');
    }

    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
