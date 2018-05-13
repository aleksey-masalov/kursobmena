<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class ConfirmEmailNotification extends Notification
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
            ->from(config('mail.sender.noreply.address'), config('mail.sender.noreply.name'))
            ->subject(trans('notification.confirm-email.subject'))
            ->greeting(sprintf(trans('notification.confirm-email.greeting'), $user->name))
            ->line(trans('notification.confirm-email.header'))
            ->action(trans('notification.confirm-email.action'), route('email.confirm', $user->confirmation_code))
            ->line(trans('notification.confirm-email.footer'));
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
