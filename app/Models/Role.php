<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_TYPE_ADMIN = 'administrator';
    const ROLE_TYPE_MANAGER = 'manager';
    const ROLE_TYPE_SERVICE = 'service';
    const ROLE_TYPE_USER = 'user';

    const ROLE_TYPE_DEFAULT = self::ROLE_TYPE_USER;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
