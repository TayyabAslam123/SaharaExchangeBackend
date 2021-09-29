<?php

namespace App\Listeners;

use App\Events\testevent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class testlistner
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
     * @param  testevent  $event
     * @return void
     */
    public function handle(testevent $event)
    {
       return 1;
    }
}
