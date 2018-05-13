<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return bool
     */
    public function isConfirmedEmail()
    {
        return $this->confirmed === 1;
    }

    /**
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($this, $token));
    }

//    /**
//     * @param string|array $roles
//     * @return bool
//     */
//    public function authorizeRoles($roles)
//    {
//        if (is_array($roles)) {
//            return $this->hasAnyRole($roles) ||
//            abort(401, 'This action is unauthorized.');
//
//        }
//
//        return $this->hasRole($roles) ||
//        abort(401, 'This action is unauthorized.');
//    }

//    /**
//     * @param array $roles
//     * @return bool
//     */
//    public function hasAnyRole($roles)
//    {
//        return null !== $this->roles()->whereIn('name', $roles)->first();
//    }
//
//    /**
//     * @param string $role
//     * @return bool
//     */
//    public function hasRole($role)
//    {
//        return null !== $this->roles()->where('name', $role)->first();
//    }
//
//    /**
//     * @param string $permission
//     * @return bool
//     */
//    public function hasPermission($permission)
//    {
//        return null !== $this->permissions()->where('name', $permission)->first();
//    }
}
