<?php

namespace Tests\Unit;

use App\VigenciasPremio;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class VigenciaPremioTest extends TestCase
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
        $response->assertStatus(200);

        $response = $this->get('premios');
        $response->assertStatus(200);
        $response->assertSee("2018</td>");
    }
    
    /** @test */
    function teste_delete()
    {
        $premio = factory(VigenciasPremio::class)->create();

        $response = $this->get("/premios/delete/{$premio->id}");

        $response->assertStatus(200);
        $response->assertDontSee('2017');

        $premioVazio = VigenciasPremio::first();

        $this->assertEmpty($premioVazio);

    }
    
    /** @test */
    function testa_delete()
    {
        factory(VigenciasPremio::class)->create();

        VigenciasPremio::create([
            'edicao'            => '2016',
            'data_abertura'     => Carbon::now()->toDateTimeString(),
            'data_encerramento' => Carbon::now()->subYear(1)->toDateTimeString(),
            'encerrado'         => false
        ]);

        $response = $this->get('/premios');

        $response->assertStatus(200);
        $response->assertSee('2016');
        $response->assertSee('2017');
    }

    /** @test */
    function testa_validacoes()
    {
        factory(VigenciasPremio::class)->create();

        $data = [
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => '',
            'data_encerramento' => '',
            'encerrado'         => false
        ];

         $this->response = $this->json('POST', '/premios/create', $data);

        $this->assertValidationError('edicao');
        $this->assertValidationError('data_abertura');
        $this->assertValidationError('data_encerramento');
    }
}


















