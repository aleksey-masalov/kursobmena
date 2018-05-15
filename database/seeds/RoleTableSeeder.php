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
        $permissionSuperAdmin = Permission::where('name', Permission::PERMISSION_TYPE_SUPER_ADMIN)->first();
        $permissionViewBackend = Permission::where('name', Permission::PERMISSION_TYPE_VIEW_BACKEND)->first();
        $permissionCreateRole = Permission::where('name', Permission::PERMISSION_TYPE_CREATE_ROLE)->first();
        $permissionUpdateRole = Permission::where('name', Permission::PERMISSION_TYPE_UPDATE_ROLE)->first();
        $permissionDeleteRole = Permission::where('name', Permission::PERMISSION_TYPE_DELETE_ROLE)->first();
        $permissionViewRole = Permission::where('name', Permission::PERMISSION_TYPE_VIEW_ROLE)->first();
        $permissionCreateUser = Permission::where('name', Permission::PERMISSION_TYPE_CREATE_USER)->first();
        $permissionUpdateUser = Permission::where('name', Permission::PERMISSION_TYPE_UPDATE_USER)->first();
        $permissionDeleteUser = Permission::where('name', Permission::PERMISSION_TYPE_DELETE_USER)->first();
        $permissionViewUser = Permission::where('name', Permission::PERMISSION_TYPE_VIEW_USER)->first();

        $roleAdministrator = new Role();
        $roleAdministrator->name = Role::ROLE_TYPE_ADMIN;
        $roleAdministrator->save();
        $roleAdministrator->permissions()->attach($permissionSuperAdmin);
        $roleAdministrator->permissions()->attach($permissionViewBackend);
        $roleAdministrator->permissions()->attach($permissionCreateRole);
        $roleAdministrator->permissions()->attach($permissionUpdateRole);
        $roleAdministrator->permissions()->attach($permissionDeleteRole);
        $roleAdministrator->permissions()->attach($permissionViewRole);
        $roleAdministrator->permissions()->attach($permissionCreateUser);
        $roleAdministrator->permissions()->attach($permissionUpdateUser);
        $roleAdministrator->permissions()->attach($permissionDeleteUser);
        $roleAdministrator->permissions()->attach($permissionViewUser);

        $roleManager = new Role();
        $roleManager->name = Role::ROLE_TYPE_MANAGER;
        $roleManager->save();

        $roleUser = new Role();
        $roleUser->name = Role::ROLE_TYPE_USER;
        $roleUser->save();
    }
}
