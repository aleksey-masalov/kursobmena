<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetNotification extends Notification
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param User $user
     * @param string $token
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
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
        return (new MailMessage)
            ->from(config('mail.sender.noreply.address'), config('mail.sender.noreply.name'))
            ->subject(trans('notification.reset-password.subject'))
            ->greeting(sprintf(trans('notification.reset-password.greeting'), $this->user->name))
            ->line(trans('notification.reset-password.header'))
            ->action(trans('notification.reset-password.action'), route('password.reset', $this->token))
            ->line(trans('notification.reset-password.footer'));
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
