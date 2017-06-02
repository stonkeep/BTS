<?php

namespace Tests\Unit;

use App\Categoria;
use App\PostCategoria;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class PostCategoriaTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
//TODO teste
    /**
     * A basic test example.
     *
     * @return void
     */
    public function teste_create()
    {
        PostCategoria::create([
            'descricao' => 'Notícias',
        ]);

        $categoria = PostCategoria::firstOrFail();
        $this->assertEquals('Notícias', $categoria->descricao);
    }

    /** @test */
    public function teste_create_por_post()
    {
//        $this->disableExceptionHandling();

        $this->json('POST', "/admin/post-categorias/create", [
            'descricao' => 'Notícias',
        ]);

        $response = $this->get('admin/post-categorias');

        $response->assertStatus(200);
        $response->assertSee('Notícias');
    }


    /** @test */
    public function teste_leitura_lista()
    {
        PostCategoria::create([
            'descricao' => 'Notícias',
        ]);
        PostCategoria::create([
            'descricao' => 'Paginas internas',
        ]);

        $response = $this->get("admin/post-categorias");

        $response->assertStatus(200);
        $response->assertSee('Notícias');
        $response->assertSee('Paginas internas');
    }

    /** @test */
    public function teste_update()
    {
        $this->json('POST', "/admin/post-categorias/create", [
            'descricao' => 'Notícias',
        ]);

        $categoria = PostCategoria::firstOrFail();

        $this->json('PUT', "admin/post-categorias/update/{$categoria->id}", [
            'descricao' => 'Paginas internas',
        ]);

        $response = $this->get("admin/post-categorias");

        $response->assertStatus(200);
        $response->assertSee('Paginas internas');
        $response->assertDontSee('Notícias');
    }

    /** @test */
    public function teste_delete()
    {
        $this->json('POST', "/admin/post-categorias/create", [
            'descricao' => 'Notícias',
        ]);

        $categoria = PostCategoria::firstOrFail();

        $response = $this->json('get', "admin/post-categorias/delete/{$categoria->id}", [
            'descricao' => 'Paginas internas',
        ]);

        $response = $this->get("admin/post-categorias");
        $response->assertStatus(200);

        $response->assertDontSee('Notícias');

    }

    /** @test */
    public function teste_validacoes()
    {

        $this->response = $this->json('POST', "/admin/categorias/create", [
            'descricao' => '',
        ]);

        $this->assertValidationError('descricao');

        $this->json('POST', "/admin/categorias/create", [
            'descricao' => 'Notícias',
        ]);
        $this->response = $this->json('POST', "/admin/categorias/create", [
            'descricao' => 'Notícias',
        ]);

        $this->assertValidationError('descricao');
    }
}
