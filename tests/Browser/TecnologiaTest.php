<?php

namespace Tests\Browser;

use App\Regioes;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestsUtil;

class RegioesTest extends DuskTestCase
{
    use DatabaseMigrations;
    use TestsUtil;

    /**
     * @return void
     */
    public function teste_insert()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'mateusgalasso@yahoo.com.br')
                ->type('descricao', 'Sul maluco')
                ->assertSee('sigla')
                ->assertSee('descricao')
                ->press('Enviar')
                ->waitForText('Sul maluco')
                ->assertsee('SS')
                ->assertsee('Sul maluco');
        });
    }


}
