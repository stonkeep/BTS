<?php

namespace Tests\Unit;

use App\Regioes;
use App\UFs;
use RegioesTableSeed;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ValidationsFields;

class TestRegioes extends TestCase
{
    use DatabaseMigrations;
    use ValidationsFields;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function can_create_regions()
    {
        Regioes::create([
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);
        
        $regiao = Regioes::firstOrFail();

        $this->assertEquals('CO', $regiao->sigla);
    }
    
    
    /** @test */
    function testa_criar_regiao_por_post()
    {
        //$this->disableExceptionHandling();
        
        $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $regiao = Regioes::firstOrFail();

        $this->assertEquals('CO', $regiao->sigla);
        
    }
    
    /** @test */
    function create_by_post_and_recive_response()
    {
        $this->disableExceptionHandling();
    	$response =  $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $response->assertStatus(200);
        $response->assertSee('CO');
        $response->assertSee('Centro - Oeste');
    }

    /** @test */
    function testa_listar_as_regioes()
    {
        Regioes::create([
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        Regioes::create([
            'sigla' => 'N',
            'Descricao' => 'Norte',
        ]);

        $response = $this->get('regioes');

        $response->assertStatus(200);
        $response->assertSee('CO');
        $response->assertSee('N');
        $response->assertSee('Centro - Oeste');
        $response->assertSee('Norte');
    }
    
    /** @test */
    function testa_seed_de_regioes()
    {
        //Se não funcionar tentar o comando 'composer dump-autoload'
        $regioesSeed = new RegioesTableSeed;
        $regioesSeed->run();

        $regioes = Regioes::get();

        $this->assertTrue($regioes->pluck('sigla')->contains('N'));
        $this->assertTrue($regioes->pluck('sigla')->contains('NE'));
        $this->assertTrue($regioes->pluck('sigla')->contains('S'));
        $this->assertTrue($regioes->pluck('sigla')->contains('SE'));
        $this->assertTrue($regioes->pluck('sigla')->contains('CO'));
        $this->assertTrue($regioes->pluck('descricao')->contains('Centro - Oeste'));
    }
    
    /** @test */
    function testa_validacao()
    {
        $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $this->response =  $this->json('POST', "regioes/create", [
            'sigla' => 'CO',
            'Descricao' => 'Centro - Oeste',
        ]);

        $this->assertValidationError('sigla');
    }


    /** @test */
    function testa_delete()
    {
        $regioesSeed = new RegioesTableSeed;
        $regioesSeed->run();

        $regioes = Regioes::get();

        $this->assertTrue($regioes->pluck('sigla')->contains('N'));
        $this->assertTrue($regioes->pluck('sigla')->contains('NE'));
        
        $regiao = Regioes::firstOrFail();
        
        $response = $this->json('DELETE', "/regioes/delete/{$regiao->id}");

        $response->assertStatus(200);
        $response->assertSee('NE');
        $response->assertDontSee('Centro - Oeste');
    }
    
    /** @test */
    function testa_update()
    {
        $regioesSeed = new RegioesTableSeed;
        $regioesSeed->run();

        $regioes = Regioes::get();

        $this->assertTrue($regioes->pluck('sigla')->contains('N'));
        $this->assertTrue($regioes->pluck('sigla')->contains('NE'));
        $this->assertTrue($regioes->pluck('descricao')->contains('Centro - Oeste'));

        $regiao = Regioes::firstOrFail();

        $response = $this->json('PUT', "/regioes/update/{$regiao->id}", ['sigla' => 'TT',]);

        $response->assertStatus(200);
        $response->assertSee('TT');
//        $response->assertDontSee('CO');
    }
    /** @test */
    function teste_function()
    {
        $regioesSeed = new RegioesTableSeed;
        $regioesSeed->run();
        $ufs = [
            ['sigla' => 'AC','descricao' => 'Acre','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'AL','descricao' => 'Alagoas','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'AM','descricao' => 'Amazonas','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'AP','descricao' => 'Amapá','regioes_id' => Regioes::where('descricao', 'Norte')->first()->id],
            ['sigla' => 'BA','descricao' => 'Bahia','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'CE','descricao' => 'Ceará','regioes_id' => Regioes::where('descricao', 'Nordeste')->first()->id],
            ['sigla' => 'DF','descricao' => 'Distrito Federal','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'ES','descricao' => 'Espírito Santo','regioes_id' => Regioes::where('descricao', 'Sudeste')->first()->id],
            ['sigla' => 'GO','descricao' => 'Goiás','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MA','descricao' => 'Maranhão','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MG','descricao' => 'Minas Gerais','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MS','descricao' => 'Mato Grosso do Sul','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'MT','descricao' => 'Mato Grosso','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PA','descricao' => 'Pará','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PB','descricao' => 'Paraíba','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PE','descricao' => 'Pernambuco','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PI','descricao' => 'Piauí','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'PR','descricao' => 'Paraná','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RJ','descricao' => 'Rio de Janeiro','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RN','descricao' => 'Rio Grande do Norte','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RO','descricao' => 'Rondônia','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RR','descricao' => 'Roraima','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'RS','descricao' => 'Rio Grande do Sul','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SC','descricao' => 'Santa Catarina','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SE','descricao' => 'Sergipe','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'SP','descricao' => 'São Paulo','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
            ['sigla' => 'TO','descricao' => 'Tocantins','regioes_id' => Regioes::where('descricao', 'Centro - Oeste')->first()->id],
        ];


        foreach ($ufs as $uf) {
            ufs::create([
                'sigla' => $uf['sigla'],
                'descricao' => $uf['descricao'],
                'regioes_id' => $uf['regioes_id'],
            ]);
        }
    }
}
