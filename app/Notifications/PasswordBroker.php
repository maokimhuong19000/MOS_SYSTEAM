<?php

namespace App\Notifications;

use Closure;

interface PasswordBroker
{
    

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'Woop Sorry link reset has expired';

   

    /**
     * Reset the password for the given token.
     * @param  mixed  $notifiable
     * @param  array     $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    public function toMail($notifiable,array $credentials, Closure $callback);

 
}
