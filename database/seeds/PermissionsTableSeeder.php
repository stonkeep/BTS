<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Post',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'PostCategorias',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Temas',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'SubTemas',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Regioes',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Cargos',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'NaturezaJuridica',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'PublicoAlvo',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Categorias',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Tecnologias',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Premios',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'Instituicoes',
            'guard_name' => 'admin'
        ]);

    }
}
