<?php

namespace Tests\Browser;

use App\Regioes;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegioesTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function teste_lista()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/regioes')
                ->assertSee('Centro - Oeste')
                ->assertSee('Norte')
                ->assertSee('Nordeste')
                ->assertSee('Sul')
                ->assertSee('Sudeste');
        });
    }

    /**
     * @return void
     */
    public function teste_insert()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/regioes/insert')
                ->type('sigla', 'SS')
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
