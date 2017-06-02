<?php
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'admin'
        ]);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $permissions = Permission::find([1, 2, 3]);
        $role = Role::create([
            'name' => 'Owner',
            'guard_name' => 'web'
        ]);
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

    }
}
