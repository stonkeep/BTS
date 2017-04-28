<?php

namespace Tests\Unit;

use App\EnderecoEletronico;
use App\Tecnologia;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;
use Illuminate\Validation\Rule;

class TestEnderecoEletronico extends TestCase
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
        factory(Tecnologia::class)->create();
        EnderecoEletronico::create([
            'tecnologia_id' => 1,
            'link'           => 'www.google.com.br',
        ]);

        $endereco = EnderecoEletronico::firstOrFail();
        //dd($endereco);

        $this->assertEquals('www.google.com.br', $endereco->link);
    }


    /** @test */
    function teste_reader()
    {
        factory(Tecnologia::class)->create();
        EnderecoEletronico::create([
            'tecnologia_id' => 1,
            'link'           => 'www.google.com.br',
        ]);

        EnderecoEletronico::create([
            'tecnologia_id' => 1,
            'link'           => 'www.fbb.org.br',
        ]);

        $enderecos = EnderecoEletronico::where('tecnologia_id', 1)->get();
        //dd($enderecos);
        $this->assertContains('www.google.com.br', $enderecos->pluck('link'));
        $this->assertContains('www.fbb.org.br', $enderecos->pluck('link'));

    }


    /** @test */
    function teste_update()
    {
        factory(Tecnologia::class)->create();
        $endereco = EnderecoEletronico::create([
            'tecnologia_id' => 1,
            'link'           => 'www.google.com.br',
        ]);

        $endereco->link = 'www.fbb.org.br';
        $endereco->save();

        $endereco = EnderecoEletronico::firstOrFail();

        $this->assertEquals($endereco->link, 'www.fbb.org.br');
        $this->assertNotEquals($endereco->link, 'www.google.com.br');
    }

    /** @test */
    function teste_delete()
    {
        factory(Tecnologia::class)->create();
        $endereco = EnderecoEletronico::create([
            'tecnologia_id' => 1,
            'link'           => 'www.google.com.br',
        ]);
        $endereco->delete();

        $endereco = EnderecoEletronico::first();

        $this->assertEmpty($endereco);
    }

    /** @test */
    function teste_validacao()
    {
        //Grava tecnologia
        $tecnologia = factory(Tecnologia::class)->create();
        
        //Carrega dados
        $datas = [
            ['link' => 'www.google.com.br'],
            ['link' => 'www.fbb.org.br']
        ];
        
        //faz validação
        $invalido = EnderecoEletronico::validate($datas);

        if (!$invalido) {
            foreach ( $datas as $data) {
                $tecnologia->enderecosEletronico()->create($data);        
            }
        }
        
        $resultado = $tecnologia->enderecosEletronico()->get()->pluck('link');
        $this->assertContains('www.google.com.br', $resultado);
        $this->assertContains('www.fbb.org.br', $resultado);
    }

}
