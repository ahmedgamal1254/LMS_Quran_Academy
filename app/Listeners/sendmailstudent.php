<?php

namespace App\Listeners;

use App\Events\studentmailregister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendmailstudent
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
     * @param  \App\Events\studentmailregister  $event
     * @return void
     */
    public function handle(studentmailregister $event)
    {
        //
    }
}
