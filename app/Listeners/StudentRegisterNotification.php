<?php

namespace App\Listeners;

use App\Events\StudentRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StudentRegisterNotification
{
    public function __construct()
    {
        //
    }

    public function handle(StudentRegister $event)
    {
        //
    }
}
