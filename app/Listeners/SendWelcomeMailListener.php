<?php

namespace App\Listeners;

use App\Events\NewUserRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeMailListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
 

    /**
     * Handle the event.
     *
     * @param  NewUserRegisterEvent  $event
     * @return void
     */
    public function handle(NewUserRegisterEvent $event)
    {
    dump('s');
    }
}
