<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotifications extends Notification
{
    use Queueable;
    public $user, $blog;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $blog)
    {
        $this->user = $user;
        $this->blog = $blog;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'commented_username' => $this->user->username,
            'commented_avatar' => $this->user->image,
            'blog_user_id' => $this->blog->user_id,
            'comment_for_blog' => $this->blog->slug,
        ];
    }
}
