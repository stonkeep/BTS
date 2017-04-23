<?php

use App\Instituicao;
use App\Tecnologia;
use Illuminate\Database\Seeder;

class TecnologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Instituicao::class)->create();
        factory(Tecnologia::class)->create();
    }
}
