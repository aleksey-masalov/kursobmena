<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class UserRegisteredConfirmEmail extends Notification
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $this->user;

        return (new MailMessage)
            ->from(env('MAIL_USERNAME'))
            ->subject('Successfully created new account')
            ->greeting(sprintf('Hello %s', $user->name))
            ->line('You have successfully registered to our system. Please activate your account.')
            ->action('Click Here', route('email.confirm', $user->confirmation_code))
            ->line('Thank you for using our application!');
    }

    /**
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        ];
    }
}
