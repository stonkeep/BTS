<?php

use App\Cargos;
use Illuminate\Database\Seeder;

class CargosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargos::create([
            'descricao' => 'Tecnico',
        ]);
    }
}
