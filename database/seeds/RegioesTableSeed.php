<?php

use App\Regioes;
use Illuminate\Database\Seeder;

class RegioesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regioes::create([
            'sigla' => 'CO',
            'descricao' => 'Centro - Oeste'
        ]);

        Regioes::create([
            'sigla' => 'N',
            'descricao' => 'Norte'
        ]);

        Regioes::create([
            'sigla' => 'NE',
            'descricao' => 'Nordeste'
        ]);

        Regioes::create([
            'sigla' => 'S',
            'descricao' => 'Sul'
        ]);

        Regioes::create([
            'sigla' => 'SE',
            'descricao' => 'Sudeste'
        ]);
    }
}
