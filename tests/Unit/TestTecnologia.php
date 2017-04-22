<?php

namespace Tests\Unit;

use App\Instituicao;
use App\Tecnologia;
use App\Temas;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestTecnologia extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_create_tecnologia()
    {
        factory(Tecnologia::class)->create();
        $tecnologia = Tecnologia::firstOrFail();

        self::assertEquals($tecnologia->titulo, 'Teste GEPEM');
    }

    /** @test */
    public function teste_reader()
    {
        $this->disableExceptionHandling();
        factory(Instituicao::class)->create();
        factory(Tecnologia::class)->create();


        $response = $this->get('tecnologias');

        $response->assertStatus(200);
        $response->assertSee('Teste GEPEM');
    }
    //TODO teste reader
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
    //TODO criar ligação hasMany com subtemas
    //TODO criar ligação hasMany com subtemas secundarios


    //TODO model e CRUD Banco de imagens
    //TODO model e CRUD Outros documentos
    
    //TODO verificar a paginação no Laravel com VueJS
}
