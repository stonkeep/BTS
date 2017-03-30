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
            'edicao' => 2017,
            'data_abertura' => Carbon::now()->toDateTimeString(),
            'data_encerramento' => Carbon::now()->addYear(1)->toDateTimeString(),
            'encerrado' => false
        ]);

        $premio = VigenciasPremio::firstOrFail();

        $this->assertEquals(0,$premio['encerrado']);
        $this->assertEquals(2017,$premio->edicao);
        $this->assertEquals(Carbon::now()->toDateTimeString(),$premio->data_abertura);
        $this->assertEquals(Carbon::now()->addYear(1)->toDateTimeString(),$premio->data_encerramento);
    }

    /** @test */
    function can_post_a_new_premio()
    {
        //$response = $this->json('POST', "/premio-vigencia/create");
        //$response
        //    ->assertStatus(200)
        //    ->assertJson([
        //        'edicao' => 2017,
        //        'data_abertura' => Carbon::now(),
        //        'data_encerramento' => Carbon::now()->addYear(1),
        //        'encerrado' => false
        //    ]);
    }
}
