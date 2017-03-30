<?php

namespace Tests\Unit;

use App\VigenciasPremio;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PremioTest extends TestCase
{

    use DatabaseMigrations;
    
    

    /**
     * @return void
     * @test
     */
    public function can_create_award()
    {
        $this->disableExceptionHandling();

        VigenciasPremio::create([
            'edicao'            => 2017,
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
        $this->disableExceptionHandling();
        
        $dataAbertura = Carbon::now()->toDateTimeString();
        $dataEncerramento = Carbon::now()->addYear(1)->toDateTimeString();
        
        $response = $this->json('POST', "/premio-vigencia/store", [
            'edicao'            => 2017,
            'data_abertura'     => $dataAbertura, 
            'data_encerramento' => $dataEncerramento,
            'encerrado'         => false
        ]);

               
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
}
