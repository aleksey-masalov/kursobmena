<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    const ROLE_TYPE_ADMIN = 'Administrator';
    const ROLE_TYPE_MANAGER = 'Manager';
    const ROLE_TYPE_SERVICE = 'Service';
    const ROLE_TYPE_USER = 'User';

    const ROLE_TYPE_DEFAULT = self::ROLE_TYPE_USER;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
