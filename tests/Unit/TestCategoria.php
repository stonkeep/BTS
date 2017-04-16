<?php

namespace Tests\Unit;

use App\Categoria;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestCategoria extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function teste_create()
    {
        Categoria::create([
            'descricao' => 'Água',
        ]);

        $categoria = Categoria::firstOrFail();
        dd($categoria->descricao);

        $this->assertEquals('Água', $categoria->descricao);
    }

    //TODO teste create
    //TODO teste reader
    //TODO teste update
    //TODO teste delete
    //TODO teste list
    //TODO teste validações
}
