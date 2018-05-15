<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    const PERMISSION_TYPE_SUPER_ADMIN = 'super-admin';
    const PERMISSION_TYPE_VIEW_BACKEND = 'view-backend';
    const PERMISSION_TYPE_CREATE_ROLE = 'create-role';
    const PERMISSION_TYPE_UPDATE_ROLE = 'update-role';
    const PERMISSION_TYPE_DELETE_ROLE = 'delete-role';
    const PERMISSION_TYPE_VIEW_ROLE = 'view-role';
    const PERMISSION_TYPE_CREATE_USER = 'create-user';
    const PERMISSION_TYPE_UPDATE_USER = 'update-user';
    const PERMISSION_TYPE_DELETE_USER = 'delete-user';
    const PERMISSION_TYPE_VIEW_USER = 'view-user';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
