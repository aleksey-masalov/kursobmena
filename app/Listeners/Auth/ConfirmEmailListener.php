<?php

namespace App\Listeners\Auth;

use App\Notifications\UserRegisteredConfirmEmail;
use App\Models\User;
use Mail;

class ConfirmEmailListener
{
    /**
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        if (config('auth.confirm_email')) {
            $user = $this->generateConfirmationCode($event->user);
            $user->notify(new UserRegisteredConfirmEmail($user));
        }
    }

    /**
     * @param User $user
     * @return User
     */
    private function generateConfirmationCode(User $user)
    {
        $user->confirmation_code = generateConfirmationCode();
        $user->save();

        return $user;
    }
}
