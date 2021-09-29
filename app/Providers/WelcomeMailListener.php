<?php

namespace App\Providers;

use App\Providers\NewUserIsMadeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserIsMadeEvent  $event
     * @return void
     */
    public function handle(NewUserIsMadeEvent $event)
    {
        //
    }
}
