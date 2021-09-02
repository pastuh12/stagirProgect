<?php

namespace App\Listeners;

use App\Events\NewsHasViewed;

class Counter
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
     * @param  NewsHasViewed  $event
     * @return void
     */
    public function handle(NewsHasViewed $event): void
    {
        $event->news->increment('views');
    }
}
