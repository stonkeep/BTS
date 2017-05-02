<?php

namespace Tests\Unit;

use App\VigenciasPremio;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class PremioTest extends TestCase
{

    use DatabaseMigrations;
    use ValidationsFields;
    
    /**
     * @return void
     * @test
     */
    public function can_create_award()
    {
        $this->disableExceptionHandling();

        VigenciasPremio::create([
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => Carbon::now()->toDateTimeString(),
            'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
            'encerrado'         => false
        ]);

        $premio = VigenciasPremio::firstOrFail();

        $this->assertEquals(0, $premio['encerrado']);
        $this->assertEquals(2017, $premio->edicao);
        $this->assertEquals(Carbon::now()->toDateTimeString(), $premio->data_abertura);
        $this->assertEquals(Carbon::now()->addYear(1)->toDateTimeString(), $premio->data_encerramento);
    }


    /** @test */
    function can_post_a_technology()
    {
        //$this->disableExceptionHandling();

        $dataAbertura = Carbon::now()->toDateTimeString();
        $dataEncerramento = Carbon::now()->addYear(1)->toDateTimeString();

        $response = $this->json('POST', "/premios/create", [
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => $dataAbertura,
            'data_encerramento' => $dataEncerramento,
            'encerrado'         => false
        ]);

        $response->assertStatus(200);
        //veirifca se foi gravado
        $premio = VigenciasPremio::firstOrFail();

        $this->assertEquals(0, $premio['encerrado']);
        $this->assertEquals(2017, $premio->edicao);
        $this->assertEquals($dataAbertura, $premio->data_abertura);
        $this->assertEquals($dataEncerramento, $premio->data_encerramento);

        //Verifica se retorna o premio gravado na view
        $response->assertStatus(200);
        $response->assertSee('2017');
        $response->assertSee($dataAbertura);
        $response->assertSee($dataEncerramento);
    }

    /** @test */
    function testa_validacao()
    {
        $dataAbertura = Carbon::now()->toDateTimeString();
        $dataEncerramento = Carbon::now()->addYear(1)->toDateTimeString();

        $this->json('POST', "/premios/create", [
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => $dataAbertura,
            'data_encerramento' => $dataEncerramento,
            'encerrado'         => false
        ]);

        //Verifica duplicação de premio
        $this->response = $this->json('POST', "/premios/create", [
            'edicao'            => Carbon::now()->year,
            'data_abertura'     => $dataAbertura,
            'data_encerramento' => $dataEncerramento,
            'encerrado'         => false
        ]);

        
        $this->assertValidationError('edicao');

        $this->response = $this->json('POST', "/premios/create", [
            'edicao'            => Carbon::now()->year,
            //'data_encerramento' => $dataEncerramento,
            'encerrado'         => false
        ]);

        $this->assertValidationError('data_abertura');
        $this->assertValidationError('data_encerramento');
        
    }


    /** @test */
    function pode_listar_todos_os_premios()
    {
        $this->disableExceptionHandling();

        $premio1 = factory(VigenciasPremio::class)->create();
        $premio2 = factory(VigenciasPremio::class)->create([
            'edicao'    => 2018,
            'encerrado' => true
        ]);

        $response = $this->get('/premios');

        //dd($response);

        //Verifica se retorna o premio gravado na view
        $response->assertStatus(200);
        $response->assertSee(strval($premio1->edicao));
        $response->assertSee($premio1->data_abertura);
        $response->assertSee($premio1->data_encerramento);
        $response->assertSee('Não');

        $response->assertSee(strval($premio2->edicao));
        $response->assertSee($premio2->data_abertura);
        $response->assertSee($premio2->data_encerramento);
        $response->assertSee('Sim');
    }


    /** @test */
    function testa_delete()
    {
        $premio1 = factory(VigenciasPremio::class)->create();
        $premio2 = factory(VigenciasPremio::class)->create([
            'edicao'    => 2018,
            'encerrado' => true
        ]);

        $premio = VigenciasPremio::findOrFail(1);

        $this->json('DELETE', "/premios/delete/{$premio->id}");

        $response = $this->get('/premios');

        $response->assertStatus(200);
        $response->assertSee('2018');
        //$response->assertDontSee('2017');
    }


    /** @test */
    function testa_update()
    {
        $premio1 = factory(VigenciasPremio::class)->create();
        $premio2 = factory(VigenciasPremio::class)->create([
            'edicao'    => 2018,
            'encerrado' => true
        ]);

        $this->json('PUT', "/premios/update/{$premio2->id}", ['edicao' => 2019,]);

        $response = $response = $this->get('/premios');
        $response->assertStatus(200);
        $response->assertSee('<th scope="row">2019</th>');
        $response->assertDontSee('<th scope="row">2018</th>');

    }

}
