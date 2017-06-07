<?php

namespace Tests\Unit;

use App\Post;
use App\PostCategoria;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields; //Trait que trata das validações
    
    public function setUp()
    {
        parent::setUp(); 
        factory(Post::class)->create();
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function teste_cria_post()
    {
        $post = Post::first();
        $this->assertEquals($post->title, 'Teste 1');
    }
    
    /** @test */
    function teste_update()
    {
        $post = Post::first();
        $post->title = 'Teste 2';

        $this->assertEquals($post->title, 'Teste 2');
        $this->assertNotEquals($post->title, 'Teste 1');
    }
    
    /** @test */
    function teste_delete()
    {
        $post = Post::first();
        $post->delete();

        $post = Post::first();
        $this->assertNull($post);
    }   

    /** @test */
    function teste_create_por_json()
    {
        $this->json('POST', 'admin/new-post', [
            'author_id' => 1,
            'title' => 'Teste 1',
            'body' =>  'TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE ',
            'slug' => 'teste-1',
            'active' => true,
        ]);

        $post = Post::first();

        $this->assertEquals($post->title, 'Teste 1');
    }   

    /** @test */
    function teste_post_de_uma_categoria()
    {
        $postCategoria = factory(PostCategoria::class)->create();
        $this->json('POST', 'admin/new-post', [
            'id' => 1,
            'author_id' => 1,
            'title' => 'Teste 1',
            'body' =>  'TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE ',
            'slug' => 'teste-1',
            'categoria_id' => $postCategoria->id,
            'active' => true,
        ]);

        $post = Post::first();
        
        $this->assertEquals($post->title, 'Teste 1');
        $this->assertEquals($post->categoria->descricao, 'Notícias');
    }
    
}
