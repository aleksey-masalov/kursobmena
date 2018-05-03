<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_SUPER_ADMIN;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_VIEW_BACKEND;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_CREATE_ROLE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_UPDATE_ROLE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_DELETE_ROLE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_VIEW_ROLE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_CREATE_USER;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_UPDATE_USER;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_DELETE_USER;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_VIEW_USER;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_CREATE_SERVICE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_UPDATE_SERVICE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_DELETE_SERVICE;
        $permission->save();

        $permission = new Permission();
        $permission->name = Permission::PERMISSION_TYPE_VIEW_SERVICE;
        $permission->save();
    }
}
