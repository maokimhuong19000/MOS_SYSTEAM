<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CusResetPassword extends Notification
{
    use Queueable;
    public $token;
     /**
     * Create a new notification instance.
     *
     * @return void
     */
      /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;
    public function __construct($token)
    {
        $this->token = $token;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }else{
            return (new MailMessage)
            ->subject('Password Reset Request')
            ->greeting("Hello!")
            ->line('You are receiving this email because we received a password reset request for your account. Click the button below to reset your password:')
            // ->action('Reset Password', url('password/reset', $this->token).'?email='.urlencode($notifiable->email))
            ->action('Reset Password', route('cus.password.reset',$this->token).'?email='.urlencode($notifiable->email))
            ->line('If you did no use this link within 3 day, it is will expire.')
            ->line('Thank you for using '. "Moe system");
             
        }
   
        /*
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');


                    */
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
            //
        ];
    }
     /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
