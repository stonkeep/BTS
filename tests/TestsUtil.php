<?php
/**
 * Created by PhpStorm.
 * User: mateus.galasso
 * Date: 12/06/2017
 * Time: 14:46
 */

namespace Tests;

use App\User;
use Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait TestsUtil
{
    public function geraUsuario()
    {
        factory(User::class)->create();
        $user = User::first();
        Auth::login($user);

        $this->criaPermissions();
        
        $role = Role::create([
            'name'       => 'Admin',
            'guard_name' => 'web'
        ]);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $user->roles()->sync(1);//Assigning role to user
        $this->user = $user;   
    }


    public function criaPermissions()
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