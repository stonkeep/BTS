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
        $permissionSeed = new \PermissionsTableSeeder();
        $permissionSeed->run();

        $role = Role::create([
            'name'       => 'Admin',
            'guard_name' => 'web'
        ]);

        $p = Permission::firstOrFail();
        $role->givePermissionTo($p);

        $user->roles()->sync(1);//Assigning role to user
        $this->user = $user;   
    }
}