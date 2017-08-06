<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;




class NewComment extends Notification
{
    //use Queueable;
    private $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment2)
    {
        $this->comment = $comment2;   
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   public function toMail($notifiable)
    {   return (new MailMessage) ->subject('New Post!')
        ->line('A new comment was published on your post!')
        ->line('the comment was '. $this->comment->content)
        ->line('Please don\'t forget to share.');
 }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'new comment',
            'content' => $this->comment->content
        ];
    }
}
