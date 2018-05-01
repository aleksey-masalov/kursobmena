<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdministrator = Role::where('name', Role::ROLE_TYPE_ADMIN)->first();
        $roleManager = Role::where('name', Role::ROLE_TYPE_MANAGER)->first();
        $roleService = Role::where('name', Role::ROLE_TYPE_SERVICE)->first();
        $roleUser = Role::where('name', Role::ROLE_TYPE_USER)->first();

        $userAdministrator = new User();
        $userAdministrator->name = 'Administrator';
        $userAdministrator->email = 'admin@test.com';
        $userAdministrator->password = bcrypt('1234');
        $userAdministrator->save();
        $userAdministrator->roles()->attach($roleAdministrator);

        $userManager = new User();
        $userManager->name = 'Manager';
        $userManager->email = 'manager@test.com';
        $userManager->password = bcrypt('1234');
        $userManager->save();
        $userManager->roles()->attach($roleManager);

        $userService = new User();
        $userService->name = 'Service';
        $userService->email = 'service@test.com';
        $userService->password = bcrypt('1234');
        $userService->save();
        $userService->roles()->attach($roleService);

        $userUser = new User();
        $userUser->name = 'User';
        $userUser->email = 'user@test.com';
        $userUser->password = bcrypt('1234');
        $userUser->save();
        $userUser->roles()->attach($roleUser);
    }
}
