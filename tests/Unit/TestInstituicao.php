<?php

namespace Tests\Unit;

use App\Instituicao;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestInstituicao extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function teste_create()
    {
        Instituicao::create([
            
        ]);
    }

    //TODO teste create
    //TODO teste reader
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
