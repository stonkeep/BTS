<?php

namespace Tests\Unit;

use App\Cargos;
use App\User;
use PermissionsTableSeeder;
use RolesTableSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class CargosTest extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields; //Trait que trata das validações
    
    private $user;


    public function setUp()
    {
        parent::setUp();
        factory(User::class)->create();
        $user = User::first();
        Auth::login($user);
        Permission::create([
            'name'       => "Cargos",
            'guard_name' => 'web'
        ]);

        $role = Role::create([
            'name'       => 'Admin',
            'guard_name' => 'web'
        ]);

        $p = Permission::firstOrFail();
        $role->givePermissionTo($p);

        $user->roles()->sync(1);//Assigning role to user
        $this->user = $user;
    }


    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function teste_criar_cargo()
    {
        $this->disableExceptionHandling();
        Cargos::create([
            'descricao' => 'Técnico',
        ]);

        $cargo = Cargos::firstOrFail();
        
        $response = $this->actingAs($this->user, 'web')->get('/admin/cargos');

        $response->assertStatus(200);

        $this->assertEquals('Técnico', $cargo->descricao);
    }


    /** @test */
    function testa_criacao_de_cago_por_post()
    {
        $this->disableExceptionHandling();

        $response = $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $response->assertStatus(200);

        $cargo = Cargos::firstOrFail();

        $this->assertEquals('Técnico', $cargo->descricao);
    }


    /** @test */
    function teste_se_consegue_ler_uma_lista_de_cargos()
    {
        //$this->disableExceptionHandling();

        $response = $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $response->assertStatus(200);

        $response = $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Vice-Presidente',
        ]);

        $response->assertStatus(200);

        $this->response = $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        //verifica se a validação do campo deu certo
        $this->assertValidationError('descricao');

        $response = $this->json('GET', "/admin/cargos");

        $response->assertStatus(200);

        $response->assertSee('Técnico');
        $response->assertSee('Vice-Presidente');

    }


    /** @test */
    function testa_delete_de_cargo()
    {
        $this->disableExceptionHandling();

        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Vice-Presidente',
        ]);

        $cargo = Cargos::findOrFail(1);

        $response = $this->json('get', "admin/cargos/delete/{$cargo->id}");

        $response->assertStatus(200);

        $response->assertSee('Vice-Presidente');
        $response->assertDontSee('Técnico');

    }


    /** @test */
    function testa_update_cargo()
    {
        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $cargo = Cargos::findOrFail(1);

        $response = $this->json('PUT', "admin/cargos/update/{$cargo->id}", [
            'descricao' => 'Outra descrição'
        ]);

        $cargo = Cargos::findOrFail(1);

        $response->assertStatus(200);

        $this->assertEquals($cargo->descricao, 'Outra descrição');
        $this->assertNotEquals($cargo->descricao, 'Técnico');

    }
}
