<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'           => 'Mateus Galasso',
            'email'          => 'mateusgalasso@yahoo.com.br',
            'password'       => $password = bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
        $role = Role::where('name', 'Admin');
        $p = Permission::where('name', 'Cargos');
        $user->roles()->sync(1);
        
    }
}
