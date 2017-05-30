<?php

namespace Tests\Unit;

use App\Responsavel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class ResponsavelTest extends TestCase
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
        Responsavel::create([
            'nome' => 'João Carlos',
            'telefone' => '3131313131',
            'email' => 'joao@algumlugar.com.br',
        ]);

        $responsavel = Responsavel::firstOrFail();

        $this->assertEquals('João Carlos', $responsavel->nome);
        $this->assertEquals('3131313131', $responsavel->telefone);
        $this->assertEquals('joao@algumlugar.com.br', $responsavel->email);
    }

    /** @test */
    function teste_create_por_post()
    {
        $response = $this->json('POST', "/admin/responsaveis/create", [
            'nome'     => 'João Carlos',
            'telefone' => '3131313131',
            'email'    => 'joao@algumlugar.com.br',
        ]);

        $response->assertStatus(200);
        $responsavel = Responsavel::firstOrFail();

        $this->assertEquals('João Carlos', $responsavel->nome);
        $this->assertEquals('3131313131', $responsavel->telefone);
        $this->assertEquals('joao@algumlugar.com.br', $responsavel->email);
    }
    
    /** @test */
    function teste_leitura()
    {
        //$this->disableExceptionHandling();
        Responsavel::create([
            'nome' => 'João Carlos',
            'telefone' => '3131313131',
            'email' => 'joao@algumlugar.com.br',
        ]);

        //Cria dois registros para verificar se esta varrendo a lista corretamente
        Responsavel::create([
            'nome' => 'Eduardo',
            'telefone' => '999999',
            'email' => 'Eduardo@algumlugar.com.br',
        ]);
        
        $response = $this->get("admin/responsaveis");

        $response->assertStatus(200);
        $response->assertSee('João Carlos');
        $response->assertSee('Eduardo');
        $response->assertSee('3131313131');
        $response->assertSee('999999');
        $response->assertSee('joao@algumlugar.com.br');
        $response->assertSee('Eduardo@algumlugar.com.br');
    }
    
    /** @test */
    function teste_update()
    {
        $responsavel = Responsavel::create([
            'nome' => 'João Carlos',
            'telefone' => '3131313131',
            'email' => 'joao@algumlugar.com.br',
        ]);

        $this->json('PUT', "admin/responsaveis/update/{$responsavel->id}", [
            'nome' => 'Eduardo',
        ]);

        $response = $this->get("admin/responsaveis");

        $response->assertStatus(200);
        $response->assertDontSee('João Carlos');
        $response->assertSee('Eduardo');
    }
    
    
    /** @test */
    function teste_delete()
    {
        $responsavel = Responsavel::create([
            'nome' => 'João Carlos',
            'telefone' => '3131313131',
            'email' => 'joao@algumlugar.com.br',
        ]);

        $this->json('DELETE', "responsaveis/delete/{$responsavel->id}");
        
        $response = $this->get("admin/responsaveis");

        $response->assertStatus(200);
        $response->assertDontSee('João Carlos');
    }
    
    /** @test */
    function teste_de_validacao()
    {
        //valida campo requerido
        $this->response = $this->json('POST', "/admin/responsaveis/create", [
            'nome' => '',
            'telefone' => '',
            'email' => '',
        ]);
        $this->assertValidationError('nome');
        $this->assertValidationError('telefone');
        $this->assertValidationError('email');


        //verifica compo só numerico e formato de email
        $this->response = $this->json('POST', "/admin/responsaveis/create", [
            'nome' => 'João Carlos',
            'telefone' => '31313131A31',
            'email' => 'joao@',
        ]);
        $this->assertValidationError('telefone');
        $this->assertValidationError('email');
    }
    
}
