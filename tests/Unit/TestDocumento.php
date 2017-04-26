<?php

namespace Tests\Unit;

use App\EnderecoEletronico;
use App\Tecnologia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestDocumento extends TestCase
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
        $this->isTrue();
    }
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
