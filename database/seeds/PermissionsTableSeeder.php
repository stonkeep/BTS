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
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'PostCategorias',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Temas',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'SubTemas',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Regioes',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Cargos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'NaturezaJuridica',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'PublicoAlvo',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Categorias',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Tecnologias',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Premios',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Instituicoes',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Files',
            'guard_name' => 'web'
        ]);

    }
}
