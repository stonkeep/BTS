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
            'name' => 'Create Post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Edit Post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Delete Post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Administer roles & permissions',
            'guard_name' => 'web'
        ]);
    }
}
