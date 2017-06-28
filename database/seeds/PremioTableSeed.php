<?php

use App\VigenciasPremio;
use Illuminate\Database\Seeder;

class PremioTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VigenciasPremio::create([
            'edicao' => 2016,
            'data_abertura' => '2016-04-01',
            'data_encerramento' => '2016-10-01',
            'encerrado' => true,
        ]);

        VigenciasPremio::create([
            'edicao' => 2017,
            'data_abertura' => '2017-04-01',
            'data_encerramento' => '2017-10-01',
            'encerrado' => false,
        ]);
    }
}
