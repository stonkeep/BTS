<?php

namespace Tests\Unit;

use App\Cargos;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Session;
use PermissionsTableSeeder;
use RolesTableSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestsUtil;
use Tests\ValidationsFields;

class CargosTest extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields; //Trait que trata das validações
    use TestsUtil;
    
    private $user;


    public function setUp()
    {
        parent::setUp();
        $this->geraUsuario();
        //factory(User::class)->create();
        //$user = User::first();
        //Auth::login($user);
        //Permission::create([
        //    'name'       => "Cargos",
        //    'guard_name' => 'web'
        //]);
        //
        //$role = Role::create([
        //    'name'       => 'Admin',
        //    'guard_name' => 'web'
        //]);
        //
        //$p = Permission::firstOrFail();
        //$role->givePermissionTo($p);
        //
        //$user->roles()->sync(1);//Assigning role to user
        //$this->user = $user;
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
//        $this->disableExceptionHandling();
        Session::start();
        $this->faker = Factory::create('en_EN');

        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Vice-Presidente',
        ]);

        $cargo = Cargos::findOrFail(1);

        $response = $this->delete("admin/cargos/{$cargo->id}");
//        $response = $this->delete('admin/cargos/', [$cargo->id],  ['_token' => csrf_token()]);

        $response->assertStatus(302);

        $cargo = Cargos::first();

        $this->assertNotEquals($cargo->descricao, 'Técnico');
        $this->assertEquals($cargo->descricao, 'Vice-Presidente');

    }


    /** @test */
    function testa_update_cargo()
    {
        $this->json('POST', "/admin/cargos/", [
            'descricao' => 'Técnico',
        ]);

        $cargo = Cargos::findOrFail(1);

        $response = $this->put("admin/cargos/{$cargo->id}", [
            'descricao' => 'Outra descrição'
        ]);

        $response->assertStatus(200);
        $cargo = Cargos::findOrFail(1);

        $this->assertEquals($cargo->descricao, 'Outra descrição');
        $this->assertNotEquals($cargo->descricao, 'Técnico');

    }
}
