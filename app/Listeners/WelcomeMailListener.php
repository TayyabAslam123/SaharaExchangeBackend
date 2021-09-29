<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\MyTestMail;


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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        \Log::info("welcome mail trigger");
        //Mail::to($event->users->email)->send(new MyTestMail());
        Mail::to('codingtroops@gmail.com')->send(new \App\Mail\MyTestMail());
    }
}
