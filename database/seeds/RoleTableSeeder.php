<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::where('name', Permission::PERMISSION_TYPE_SUPER_ADMIN)->first();

        $roleAdministrator = new Role();
        $roleAdministrator->name = Role::ROLE_TYPE_ADMIN;
        $roleAdministrator->save();
        $roleAdministrator->permissions()->attach($permission);

        $roleManager = new Role();
        $roleManager->name = Role::ROLE_TYPE_MANAGER;
        $roleManager->save();

        $roleService = new Role();
        $roleService->name = Role::ROLE_TYPE_SERVICE;
        $roleService->save();

        $roleUser = new Role();
        $roleUser->name = Role::ROLE_TYPE_USER;
        $roleUser->save();
    }
}
