<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendWelcomeEmailJob;

// class SendWelcomeEmailListener implements ShouldQueue -- this will keep the listener in the queue and will be processed in the background
class SendWelcomeEmailListener
{
    //use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $afterCommit = true;

    public function handle(UserRegistered $event)
    {
        SendWelcomeEmailJob::dispatch(
            $event->user
        );
    }
}
