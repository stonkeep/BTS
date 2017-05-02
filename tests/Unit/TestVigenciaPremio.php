<?php

namespace Tests\Unit;

use App\VigenciasPremio;
use Carbon\Carbon;
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
    function teste_create_json()
    {
        $response  = $this->json('POST', "/premios/create", [
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => Carbon::now()->toDateTimeString(),
            'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
            'encerrado'         => false
        ]);

        $response->assertStatus(200);

        dd($response);
        $response->assertSee((string)(Carbon::now()->year));
    }

    /** @test */
    public function teste_reader()
    {
        factory(VigenciasPremio::class)->create();

        $response = $this->get('premios');

        $response->assertStatus(200);
        $response->assertSee((string)(Carbon::now()->year));
    }

    /** @test */
    function teste_update()
    {
        $premio = factory(VigenciasPremio::class)->create();
        
        $response = $this->json('PUT', "/premios/update/{$premio->id}",['edicao' => '2018']);

        $response = $this->get('premios');
        $response->assertStatus(200);
        $response->assertSee("<th scope=\"row\">2018</th>");
    }
    
    /** @test */
    function teste_delete()
    {
        $premio = factory(VigenciasPremio::class)->create();

        $response = $this->get("/premios/delete/{$premio->id}");

        dd($response);
        $response->assertStatus(200);
        $response->assertDontSee('2017');

    }
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}


















