<?php

namespace Tests\Unit;

use App\Categoria;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestsUtil;
use Tests\ValidationsFields;

class CategoriaTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
    use TestsUtil;
    
    public function setUp()
    {
        parent::setUp(); 
        
        $this->geraUsuario();        
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function teste_create()
    {
        Categoria::create([
            'descricao' => 'Água',
        ]);

        $categoria = Categoria::firstOrFail();
        $this->assertEquals('Água', $categoria->descricao);
    }

    /** @test */
    public function teste_create_por_post()
    {
//        $this->disableExceptionHandling();

        $this->json('POST', "/admin/categorias/", [
            'descricao' => 'Água',
        ]);

        $response = $this->get('admin/categorias');

        $response->assertStatus(200);
        $response->assertSee('Água');
    }


    /** @test */
    public function teste_leitura_lista()
    {
        Categoria::create([
            'descricao' => 'Água',
        ]);
        Categoria::create([
            'descricao' => 'Terra',
        ]);

        $response = $this->get("admin/categorias");

        $response->assertStatus(200);
        $response->assertSee('Água');
        $response->assertSee('Terra');
    }

    /** @test */
    public function teste_update()
    {
        $this->json('POST', "/admin/categorias", [
            'descricao' => 'Água',
        ]);

        $categoria = Categoria::firstOrFail();

        $this->put("admin/categorias/{$categoria->id}", [
            'descricao' => 'Terra',
        ]);

        $response = $this->get("admin/categorias");

        $response->assertStatus(200);
        $response->assertSee('Terra');
        $response->assertDontSee('Água');
    }

    /** @test */
    public function teste_delete()
    {
        $this->json('POST', "/admin/categorias/", [
            'descricao' => 'Água',
        ]);

        $categoria = Categoria::firstOrFail();

        $response = $this->delete("admin/categorias/{$categoria->id}");

        $response = $this->get("admin/categorias");
        $response->assertStatus(200);

        $response->assertDontSee('Água');

    }

    /** @test */
    public function teste_validacoes()
    {

        $this->response = $this->json('POST', "/admin/categorias/", [
            'descricao' => '',
        ]);

        $this->assertValidationError('descricao');

        $this->json('POST', "/admin/categorias/", [
            'descricao' => 'Água',
        ]);
        $this->response = $this->json('POST', "/admin/categorias/", [
            'descricao' => 'Água',
        ]);

        $this->assertValidationError('descricao');
    }
}
