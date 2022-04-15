<?php

namespace App\Listeners;

use App\Events\notify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class notifications
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
     * @param  \App\Events\notify  $event
     * @return void
     */
    public function handle(notify $event)
    {
        
    }
}
