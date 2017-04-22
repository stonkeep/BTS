<?php

namespace Tests\Unit;

use App\Temas;
use TemaTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TemaTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;

    private function cria_lista_de_temas()
    {
        $this->json('POST', "/temas/create", [
            'nome' => 'Alimentação'
        ]);

        $this->json('POST', "/temas/create", [
            'nome' => 'Educação'
        ]);
    }
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
        $this->json('POST', "/temas/create", [
            'nome' => 'Alimentação'
        ]);

        $response = $this->json('POST', "/temas/create", [
            'nome' => 'Educação'
        ]);

        $response->assertStatus(200);
        $response->assertSee('Educação');
        $response->assertSee('Alimentação');

    }
    
    /** @test */
    function teste_visualiza_lista_de_temas()
    {
                
        $this->cria_lista_de_temas();
        
        $response = $this->get('temas');

        $response->assertStatus(200);
        $response->assertSee('Alimentação');
        $response->assertSee('Educação');
        
        
        //Testa a validação
        $this->response = $this->json('POST', "/temas/create", [
            'nome' => 'Alimentação'
        ]);

        $this->assertValidationError('nome');
        
    }

    /** @test */
    function testa_delete()
    {
        $this->cria_lista_de_temas();

        $tema = Temas::findOrFail(1);
        
        $response = $this->json('DELETE', "temas/delete/{$tema->id}");

        $response->assertStatus(200);
        $response->assertDontSee('Alimentação');
        $response->assertSee('Educação');
        
    }
    
    /** @test */
    function testa_update()
    {
        $this->cria_lista_de_temas();

        $tema = Temas::findOrFail(1);

        $response = $this->json('PUT', "temas/update/{$tema->id}", ['nome' => 'Energia']);

        $response->assertStatus(200);
        $response->assertSee('Energia');
        $response->assertSee('Educação');
        $response->assertDontSee('Alimentação');
        
    }

    /** @test */
    public function teste()
    {
        $temasSeed = new TemaTableSeeder;
        $temasSeed->run();

        $temas = Temas::all();
    }
}
