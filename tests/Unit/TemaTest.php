<?php

namespace Tests\Unit;

use App\Temas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemaTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function criar_tema()
    {

        $this->disableExceptionHandling();

        Temas::create([
            'nome' => 'Alimentação',
        ]);

        $temas = Temas::firstOrFail();

        $this->assertEquals($temas->nome, 'Alimentação');
    }

    /** @test */
    function teste_model_factory()
    {
    	$tema = factory(Temas::class)->create();

        $temas = Temas::firstOrFail();

        $this->assertEquals($temas->nome, 'Alimentação');
    }

    /** @test */
    function cria_tema_por_post()
    {
        //$this->disableExceptionHandling();

    	$this->json('POST', "/temas/create", [
    	    'nome' => 'Alimentação'
        ]);

        $temas = Temas::firstOrFail();


        $this->assertEquals($temas->nome, 'Alimentação');
    }

    /** @test */
    function cria_tema_por_post_recebe_view()
    {
        $response = $this->json('POST', "/temas/create", [
            'nome' => 'Alimentação'
        ]);

        $response->assertStatus(200);

    }
    //TODO criar teste de delete
    //TODO criar teste de update
}
