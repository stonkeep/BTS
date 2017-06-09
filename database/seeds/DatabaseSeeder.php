<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegioesTableSeed::class);
        $this->call(CargosTableSeed::class);
        $this->call(NaturezasJuridicasTableSeeder::class);
        $this->call(ProfissoesTableSeeder::class);
        $this->call(PublicoTableSeeder::class);
        $this->call(TemaTableSeeder::class);
        $this->call(UFTableSeeder::class);
        $this->call(InstituicaoTableSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(TecnologiaSeeder::class);
        $this->call(SubTemaTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PostCategoriasTableSeeder::class);

    }
}
