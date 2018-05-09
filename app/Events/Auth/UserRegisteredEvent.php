<?php

namespace App\Events\Auth;

use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserRegisteredEvent
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
