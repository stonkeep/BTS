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
        $this->call(PremioTableSeed::class);
        $this->call(CargosTableSeed::class);
        $this->call(NaturezasJuridicasTableSeeder::class);
        $this->call(ProfissoesTableSeeder::class);
        $this->call(PublicoTableSeeder::class);
        $this->call(TemaTableSeeder::class);
        $this->call(UFTableSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(SubTemaTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        if (App::environment('local')) {
            $this->call(UsersTableSeed::class);
            $this->call(PostCategoriasTableSeeder::class);
            $this->call(InstituicaoTableSeeder::class);
            $this->call(TecnologiaSeeder::class);
        }
    }
}
