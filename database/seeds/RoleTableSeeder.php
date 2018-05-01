<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdministrator = new Role();
        $roleAdministrator->name = Role::ROLE_TYPE_ADMIN;
        $roleAdministrator->description = ucwords(Role::ROLE_TYPE_ADMIN);
        $roleAdministrator->save();

        $roleManager = new Role();
        $roleManager->name = Role::ROLE_TYPE_MANAGER;
        $roleManager->description = ucwords(Role::ROLE_TYPE_MANAGER);
        $roleManager->save();

        $roleService = new Role();
        $roleService->name = Role::ROLE_TYPE_SERVICE;
        $roleService->description = ucwords(Role::ROLE_TYPE_SERVICE);
        $roleService->save();

        $roleUser = new Role();
        $roleUser->name = Role::ROLE_TYPE_USER;
        $roleUser->description = ucwords(Role::ROLE_TYPE_USER);
        $roleUser->save();
    }
}
