<?php

namespace App\Listeners;

use App\Events\LikeStatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikeStatEventListener
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
     * @param  LikeStatEvent  $event
     * @return void
     */
    public function handle(LikeStatEvent $event)
    {
        $event->repository->LikedThisOne($event->id);
    }
}
