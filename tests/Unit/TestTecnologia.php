<?php

namespace Tests\Unit;

use App\Tecnologia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestTecnologia extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function teste_create_tecnologia()
    {
        Tecnologia::create();
    }
    //TODO teste create
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
